<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Users_model');
		date_default_timezone_set("Asia/Jakarta");
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

			// mengisi sesion utama
			$sess_array = array(
					'id_user' => $result->id_usr,
					'nama' => $result->nama, 
					'level' => $result->level,
					'id_shift' => $result->id_shift,
					'keterangan' => $result->keterangan,
					'id_district' => $result->id_district
				);	  

			// isi sesion admin
			if ($result->level==1) {

				// membuat auto pick line
				// mencari carline di distric  id_district
				$carl = $this->Users_model->cariCarlineByDistric($result->id_district);
				if (!$carl) {
					$this->session->unset_userdata('pdo_logged');
					$this->session->unset_userdata('pdo_opt');
					$output['error'] = true;
				} 

				$cline = $this->Users_model->getAdminLineAutoPicker($carl->id);

				if ($cline) {
					$ses_additional = array(
										'tgl'  => date("Y-m-d"),
										'id_shift' => $result->id_shift,
										'id_line'  => $cline->id_lst
									); 
				}else{
					$this->session->unset_userdata('pdo_logged');
					$this->session->unset_userdata('pdo_opt');
					$output['error'] = true;
				}  

			}else{

				// megisi SESION Optional
				$carl = $this->Users_model->getUsersCarlineGroup($result->id_usr);
				$cline = $this->Users_model->getUsersLineByCarline($result->id_usr,$carl[0]->id_carline); //setting aouto pick line

				$ses_additional = array(
						'tgl'  => date("Y-m-d"),
						'id_shift' => $result->id_shift,
						'id_line'  => $cline[0]->id_lst
					);
			} 

			// set sesion logined
			$this->session->set_userdata('pdo_logged',$sess_array); 
			$this->session->set_userdata('pdo_opt',$ses_additional); 

			$output['level'] = $result->level;
			$output['message'] = 'Prosess Masuk. Tunggu sebentar...';
			// $output['opt'] = $ses_additional;
		}else{

			$this->session->unset_userdata('pdo_logged');
			$this->session->unset_userdata('pdo_opt');
			$output['error'] = true;
		}

		echo json_encode($output);
	}

	// update data additional
	public function updateDataOpt()
	{
		$ses_additional = array(
						'tgl'  => $this->input->post('tgl'),
						'id_shift' => $this->input->post('sif'),
						'id_line'  => $this->input->post('line')
					);
		$this->session->set_userdata('pdo_opt',$ses_additional);
		
		echo json_encode($ses_additional);
	}


}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */