<?php

namespace App\Controllers;
use App\Models\RelationManager_Dashboard;

class Rm_Dashboard extends BaseController
{
	public function index()
	{
		$data = [
            'user_type' => 0,
            'product_id' => 0,
            'rm_id' => 0,
        ];
		$RmModel = new RelationManager_Dashboard();
		$result = $RmModel->getStats($data);
		
		// Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/dashboard', $result);

        // Load the footer view
        echo view('rm/footer');

		
	}
}
