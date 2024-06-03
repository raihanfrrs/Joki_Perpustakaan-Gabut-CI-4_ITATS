<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbuku extends Model
{
    protected $table               = 'tb_buku';
    protected $primaryKey          = 'isbn';
    protected $useAutoIncrement    = true;
    protected $returnType          = 'object';
    protected $protectFields       = true;
    protected $allowedFields       = ['judul_buku', 'penulis', 'penerbit', 'sampul'];
}
