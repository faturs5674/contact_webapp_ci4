<?php

namespace App\Models;

use CodeIgniter\Model;

class M_contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField  = false;
    protected $allowedFields = ['nama', 'email', 'nohp'];
}
