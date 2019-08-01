<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('SupervisorModel');

		// jika tidak memiliki sesi		
		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}	
	}

	public function index()
	{
		// get sesion
		$ses_dat = $this->session->userdata('pdo_logged'); 

		if ($ses_dat['level'] !=1) {
			redirect('dasboard','refresh');
		}
		
		$this->load->view('supervisor/spv');
	}

// Supervisor
	public function newSpv()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataSpv = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'passcode' => $this->input->post('passcode')
		);

		// insert data new Line
		$result = $this->SupervisorModel->createSpv($dataSpv);
		if($result){
			// $output ['status'] = "ok";
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getSpv()
	{
		# code...
		$result = $this->SupervisorModel->getSpv();

		$daut = array();
		foreach ($result as $key) {
			$dat = $this->SupervisorModel->getRecordById($key->id);
			$tmp = array(
					'id' => $key->id,
					'nama' => $key->nama,
					'nik' => $key->nik,
					'passcode' => $key->passcode,
					'isi' => $dat
					);
			array_push($daut, $tmp);
		} 

		echo json_encode($daut);
	}
	public function updateSpv()
	{
		# code...
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$passcode = $this->input->post('passcode');
		$result = $this->SupervisorModel->updateSpv($id,$nik,$nama,$passcode);
		echo json_encode($result);
	}

	public function delSpv()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->SupervisorModel->delSpv($id);
		echo json_encode($data);
	}

// Supervisor detail

	public function newJobLine()// new spv manager
	{
		// temp arraay
		$as = array();

		$id_spv = $this->input->post('id_spv');
		$arrline = $this->input->post('linemgr');
			 
		if (is_array($arrline)) {
			
			foreach($arrline as $vl) { 
			    $ne = array(
				    	'id_supervisor' => $id_spv,
				    	'id_list_carline' => $vl
				    );
			    array_push($as, $ne);

			    $this->SupervisorModel->newSpvMgr($ne);
			}

		}else{
			echo json_encode('NOOOO');
		}

		echo json_encode($as);
	}

	public function getUserById()
	{
		# code...
		$data = $this->SupervisorModel->getRecordById($this->input->post('id'));
		echo json_encode($data);
	}

	public function getListById()
	{
		# code...
		$data = $this->SupervisorModel->getListById($this->input->post('id'));
		echo json_encode($data);
	}

	public function delSM()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->SupervisorModel->deleteSpvMan($id);
		echo json_encode($data);
	}
}

/* End of file supervisor.php */
/* Location: ./application/controllers/supervisor.php */