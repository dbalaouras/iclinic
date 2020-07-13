<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
	public function index()
	{
		$data = [
			'title' => ''
		];
		echo view('templates/header', $data);
		echo view('home', $data);
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
