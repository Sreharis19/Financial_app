<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Home extends BaseController
{

	public function checkSession()
	{
		// Load the session library
		$session = session();

		// Check if user is not logged in
		if ($session->get('user')) {
			$data = $session->get('user');

			if ($data->user_type == 1) {
				return redirect()->to('../../public/Admin_dashboard');
			} else if ($data->user_type == 2) {
				return redirect()->to('../../public/Rm_dashboard');
			} else if ($data->user_type == 3) {
				return redirect()->to('../../public/Rm_dashboard');
			} else if ($data->user_type == 4) {
				return redirect()->to('../../public/Client_dashboard');
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
		if ($result->status == true) {
			$this->setSessionData('user', $result);
		}
		echo json_encode(array($result));
		exit(0);
	}
	/* controller fun for rendering sing up page */
	public function signupView()
	{
		$AuthModel = new AuthModel();
		$result = $AuthModel->getCountryAndPostList();

		$this->checkSession();
		$data['title'] = "SignUp";
		return view('SignUp', $result);
	}

	/* controller fun for inserting new user data from sign up page*/
	public function signupProcess()
	{
		$data = $this->request->getPost();
        $image = $this->request->getFile('image');

		$array = (array) $data['product'];
		$pro = implode('#', $array);
		$products = str_replace(',', '#', $pro);

		if ($image) {
			// Set image name and path
			$imageName = $image->getName();
			$imageExt = $image->getExtension();
			$imageNewName = date('YmdHis') . '.' . $imageExt;

			// Move image to destination folder
			$image->move(ROOTPATH . 'public/assets/uploads/users', $imageNewName);
			$data2 = [
				'user_products_ids' => $products,
				'user_min_purchase_power' => $data['min'],
				'user_max_purchase_power' => $data['max'],
				'bio' => $data['bio'],
				'user_country' => $data['country'],
				'image'=> $imageNewName
			];
		}else{
			$data2 = [
				'user_products_ids' => strval($products),
				'user_min_purchase_power' => $data['min'],
				'user_max_purchase_power' => $data['max'],
				'bio' => $data['bio'],
				'user_country' => $data['country']
			];
		}
		$hashed_password = password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 10]);

		$data1 = [
			'first_name' => $data['firstName'],
			'last_name' => $data['lastName'],
			'user_email' => $data['email'],
			'user_contact' => $data['contact'],
			'user_type' => 4,
			'user_token' => date('YmdHis'),
			'user_password' => $hashed_password
		];
		

		$AuthModel = new AuthModel();
		$result = $AuthModel->createClient($data1, $data2);
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
