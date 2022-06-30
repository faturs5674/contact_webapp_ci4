<?php

namespace App\Models;

use CodeIgniter\Model;


class M_akun extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField  = false;
    protected $allowedFields = ['nama', 'username', 'password', 'email', 'nohp'];
}
