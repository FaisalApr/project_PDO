<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		// jika punya sesi force to welcome
		if ($this->session->userdata('pdo_logged')) {
			redirect('Welcome','refresh');
		}else{
			$this->load->view('login/login');	
		} 
	}


	public function logout()
	{ 
		$this->session->unset_userdata('pdo_logged');
		$this->session->sess_destroy(); 

		redirect('Login','refresh');
	}

	//  ======= AJAX =======
	public function cekLogin()
	{
		// init
		$usr = $this->input->post('usr');
		$pwd = $this->input->post('pwd');
		$output = array('error' => false);

		$result = $this->Login_model->login($usr,$pwd);
		if ($result) { 
			$sess_array = array();
			
			$sess_array = array(
					'id_user' => $result->id_usr,
					'nama' => $result->nama, 
					'level' => $result->level,
					'id_shift' => $result->id_shift,
					'keterangan' => $result->keterangan
				);	  
			// set sesion logined
			$this->session->set_userdata('pdo_logged',$sess_array); 
			$output['level'] = 1;
			$output['message'] = 'Prosess Masuk. Tunggu sebentar...';
		}else{

			$this->session->unset_userdata('pdo_logged');
			$output['error'] = true;
		}

		echo json_encode($output);
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */