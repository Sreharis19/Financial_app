<?php namespace App\Controllers;

use App\Models\AuthModel;

class Home extends BaseController
{
	
	protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
		$validation =  \Config\Services::validation();

    }

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