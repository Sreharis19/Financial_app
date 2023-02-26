<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "Login";
		return view('login');
	}

	public function signInProcess()
	{
		$baseUrl = '';
		$data = $this->request->getPost();
		$AuthModel = new AuthModel();
		$result = $AuthModel->getUserByEmail($data);
		$this->setSessionData('user', $result);


		echo json_encode(array($result));
		exit(0);
	}
}
