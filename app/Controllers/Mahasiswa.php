<?php

namespace App\Controllers;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;
    protected $helpers = ['form'];
    public function __construct(){
        $this->mahasiswaModel = new mahasiswaModel();
    }

    public function index()
    {

        $currentPage = $this->request->getvar('page_mahasiswa') ? $this->request->getVar('page_mahasiswa') : 1;


        // Ambil Data :
        // dd($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $mahasiswa = $this->mahasiswaModel->search($keyword);
        } else {
            $mahasiswa = $this->mahasiswaModel;
        }


        $data = [
            'title' => 'Comic Page',
            'mahasiswa' => $mahasiswa->paginate(3, 'mahasiswa'),
            'pager' => $this->mahasiswaModel->pager,
            'currentPage' => $currentPage
        ];

        return view('mahasiswa/index', $data);
    }

}
