<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {
 

	function __construct(){
		parent::__construct();
		$this->load->model('Pdo_model');  
		// jika tidak memiliki sesi		
		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}		 
	}

	public function index()
	{ 
		$this->load->view('dasboard/dasboard_home'); 
	}


// ========== AJAX ================
	public function movePDO()
	{
		// get sesion
		$session_data = $this->session->userdata('pdo_logged'); 

		// init data
		$username = $session_data['id_user'];  
		$shift =  $session_data['id_shift'] ; 
		$tanggal = $this->input->post('tgl');
 		
 		// jika user sudah ada data pdo
		$result = $this->Pdo_model->cariPdo($username,$shift,$tanggal);
	}

	
}