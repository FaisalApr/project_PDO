<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {
 

	function __construct(){
		parent::__construct();
		$this->load->model('Pdo_model');  		 
	}

	public function index()
	{ 
		$username = "1"; //$this->input->post('username');
		$shift =  "1" ;//$this->input->post('password');
		$tanggal = '2019-06-21';  
 
		$data['pdo'] = $this->Pdo_model->cariPdoItems($username,$shift,$tanggal);
		$this->load->view('dasboard/dasboard_home',$data);
	}




}