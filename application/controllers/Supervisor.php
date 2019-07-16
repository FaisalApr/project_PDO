<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('SupervisorModel');
	}

	public function index()
	{
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
		$data = $this->SupervisorModel->getSpv();
		echo json_encode($data);
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