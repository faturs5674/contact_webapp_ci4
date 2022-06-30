<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Masterdata extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'created_time';
    protected $updatedField  = 'updated_time';
    protected $allowedFields = ['user_nama', 'user_no_hp', 'user_email','username','password'];

    public function gettabel($id = false)

    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['user_id' => $id])->first();
    }
}