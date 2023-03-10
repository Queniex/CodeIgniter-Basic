<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan A',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan B',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan C',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan D',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan E',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan F',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan G',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan H',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan I',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ],
            [
            'nama'          => 'Quenie Salbiyah',
            'alamat'        => 'Jalan J',
            'created_at'    => Time::now(),
            'updated_at'     => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO mahasiswa (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        // $this->db->table('mahasiswa')->insert($data);
        $this->db->table('mahasiswa')->insertBatch($data);
    }
}