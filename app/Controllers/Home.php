<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Home extends BaseController
{

	public function checkSession(){
		// Load the session library
        $session = session();

        // Check if user is not logged in
        if ($session->get('user')) {
			$data = $session->get('user');

			if($data->user_type == 1){
				return redirect()->to('../../public/Rm_dashboard');

			}else if($data->user_type == 2){
				return redirect()->to('../../public/Rm_dashboard');

			}else if($data->user_type == 3){
				return redirect()->to('../../public/Rm_dashboard');

			}else if($data->user_type == 4){
				return redirect()->to('../../public/Rm_dashboard');

			}
        }

	}
	public function index()
	{
		$this->checkSession();
		$data['title'] = "Login";
		return view('login');
	}

	public function signInProcess()
	{
		$data = $this->request->getPost();
		$AuthModel = new AuthModel();
		$result = $AuthModel->getUserByEmail($data);
		if($result->status == true){
			$this->setSessionData('user', $result);
		}
		echo json_encode(array($result));
		exit(0);
	}

	public function logOut()
	{
		 // destroy the session data
		 session()->destroy();
        
		 // redirect to the login page
		 return redirect()->to('../../public/login');
	}
	
}
