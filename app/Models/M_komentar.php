<?php 
namespace App\Models;
use CodeIgniter\Model;

class M_komentar extends Model{
    protected $table ="komentar";
    protected $primaryKey="id";
    protected $useTimestamps="true";
    protected $createdField=false;
    protected $updatedField=false;
    protected $allowedFields=['nama','likes','balasan','komentar'];
}
