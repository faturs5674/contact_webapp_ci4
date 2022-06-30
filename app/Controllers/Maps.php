<?php

namespace App\Controllers;

use \App\Models\M_maps;

class Maps extends BaseController
{
	public function index()
	{
		return view('maps/index');
	}
}
