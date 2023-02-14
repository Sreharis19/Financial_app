<?php namespace App\Controllers;

use App\Models\AuthModel;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "Login";
		return view('login');
	}

	public function signInProcess($data)
	{
		$AuthModel = new AuthModel();
		$result = $AuthModel->userLogin();
		return($result);
	}



}