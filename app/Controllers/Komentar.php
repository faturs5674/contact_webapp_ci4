<?php

namespace App\Controllers;

use \App\Models\M_komentar;

class komentar extends BaseController
{
    public function index()
    {
        return view('/Komentar/tabel');
    }
}
