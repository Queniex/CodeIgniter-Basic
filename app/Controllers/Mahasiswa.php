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

        $data = [
            'title' => 'Comic Page',
            'mahasiswa' => $this->mahasiswaModel->paginate(3, 'mahasiswa'),
            'pager' => $this->mahasiswaModel->pager,
            'currentPage' => $currentPage
        ];

        return view('mahasiswa/index', $data);
    }

}
