<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        Echo "Ini adalah halaman index Coba";
    }

    // public function about($nama = "Salbiyah")
    // {
    //     Echo "Hai, $nama.";
    // }    

    public function product($warna = "Biru")
    {
        Echo "Aku memakai baju berwarna $warna";
    }   

}
