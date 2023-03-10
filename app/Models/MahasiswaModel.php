<?php

namespace App\Models;

use CodeIgniter\Model;

class mahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat'];

    public function search($keyword) 
    {
        Return $this->table('mahasiswa')->like('nama', $keyword)->orLike('alamat', $keyword);
    }
}