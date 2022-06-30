<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_time';
    protected $updatedField  = 'updated_time';
    protected $allowedFields = ['user_nama', 'user_no_hp', 'user_email', 'username', 'password', 'created_by', 'updated_by', 'status'];
}
