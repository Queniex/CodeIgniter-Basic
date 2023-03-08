<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home Page'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Page'
        ];
        echo view('pages/about', $data);
    }

    
    public function contact()
    {
        $data = [
            'title' => 'Contact Page',
            'alamat' => [
                [
                    'Tipe' => 'Rumah',
                    'Alamat' => 'Jl. Abc No.123',
                    'Kota' => 'Jakarta'
                ],
                [
                    'Tipe' => 'Kantor',
                    'Alamat' => 'Jl. dce No.345',
                    'Kota' => 'Bandung'
                ]
            ]
        ];
        echo view('pages/contact', $data);
    }
}
