<?php

namespace App\Controllers;
use App\Models\KomikModel;

class Comics extends BaseController
{
    protected $komikModel;
    protected $helpers = ['form'];
    public function __construct(){
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Comic Page',
            'komik' => $this->komikModel->getKomik()
        ];

        // Connecting to Database manually
        // $db = \config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }


        return view('comics/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Page',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // Bila judul Komik tidak ada
        if(empty($data['komik'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');
            
        }

        return view('comics/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Create Page',
            'validation' => \Config\Services::validation()
        ];

        return view('comics/create', $data);
    }

    public function save()
    {
        // Validasi input
        session();
        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul, 1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar.',
                    'is_image' => 'File bukanlah gambar, upload kembali.',
                    'mime_in' => 'Hanya upload file bertipe jpg, jpeg, atau png'
                ]
            ]
            // 'judul' => 'required|is_unique[komik.judul]'
        ])) {

            // //$validation = \Config\Services::validation();
            // dd($validation);
            // $data['title'] = 'Form Tambah';
            // $data['validation'] = $validation;
            return redirect()->back()->withInput(); 

            // return redirect()->to('/comics/create'); 
            // return view('comics/create', $data);
        }

        // Proses memindahkan gambar
        // 1. Ambil gambar :
        $fileSampul = $this->request->getFile('sampul');

        // Pengecekan apakah user memasukkan file sampul :
        if($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // 1.1 generate nama random :
            // $namaSampul = $fileSampul->getRandomName();
    
            // 2. Pindahin file ke folder img :
            $fileSampul->move('img');
            // 2.1 Memindahkan nama yang sudah d random :
            //$fileSampul->move('img', $namaSampul);
    
            // 3. Ambil nama file :
            $namaSampul = $fileSampul->getName();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        session()->setFlashdata('warna', 'success');

        return redirect()->to('/comics');
    }

    public function delete($id)
    {
        // 1. Mencari file gambar berdasarkan id :
        $komik = $this->komikModel->find($id);
        // 2. Cek gambar bukan default.jpg :
        if ($komik['sampul'] != 'default.jpg') {
          // 3. Hapus gambar dari file img :
          unlink('img/' . $komik['sampul']);   
        }

        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil terhapus');
        session()->setFlashdata('warna', 'danger');

        return redirect()->to('/comics');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Page',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('comics/edit', $data);
    }
    
    public function update($id)
    {

        // Pengecekan judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }


        if(!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul, 1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar.',
                    'is_image' => 'File bukanlah gambar, upload kembali.',
                    'mime_in' => 'Hanya upload file bertipe jpg, jpeg, atau png'
                ]
            ]

        ])) {

            // $validation = \Config\Services::validation();
            return redirect()->to('/comics/edit/' . $this->request->getVar('slug'))->withInput(); 
        }

        $fileSampul = $this->request->getFile('sampul');

        // 1. Cek apakah masih menggunakan gambar lama :
        if ( $fileSampul->getError() == 4 ){
            // 2. Mengambil nilai sampul lama :
            $namaSampul = $this->request->getVar("oldSampul");
        } else {
            // 3. Generate nama file random :
            $namaSampul = $fileSampul->getRandomName();
            // 4. Pindahkan ke file img :
            $fileSampul->move('img', $namaSampul);
            // 5. Hapus file lama : 
            unlink('img/' . $this->request->getVar("oldSampul"));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        session()->setFlashdata('warna', 'success');

        return redirect()->to('/comics');
    }
}
