<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function ceklogin()
	{ 
		$username = "a1"; //$this->input->post('username');
		$shift =  "1" ;//$this->input->post('password'); 
		$tanggal = "";

		$result = $this->Pdo_model->cekpdoada($username,$shift,$tanggal);
		if ($result) { 

		}else {  

		}

		echo json_encode($output); 
	}
}
