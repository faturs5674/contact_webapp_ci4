<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'darsadsdth',
            'alamat' => 'sdasdaadssad',
            'email'    => 'darasdasth@theempire.com'
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO tabel1 (nama,alamat, email) VALUES(:nama:,:alamat: ,:email:)", $data);

        // Using Query Builder
        $this->db->table('tabel1')->insert($data);
    }
}
