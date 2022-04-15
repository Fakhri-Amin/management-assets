<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPersediaan extends Model
{
    protected $table = 'persediaan';
    protected $useTimesStamps = true;
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function getData()
    {
        return $this->findAll();
    }
}
