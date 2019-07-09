<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Supervisor_model');
	}


	public function index()
	{
		$data['data_sisi'] = $this->Supervisor_model->get_all_level();
		$this->load->view('supervisor/spv' , $data);

	}

	public function newSpv()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataSpv = array(
			'nama' => $this->input->post('nama_spv'),
			'nik' => $this->input->post('nik'),
			'passcode' => $this->input->post('passcode')
		);

		// insert data new Line
		$result = $this->Supervisor_model->createSpv($dataSpv);
		if($result){
			$output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getSpv()
	{
		# code...
		$data = $this->Supervisor_model->getSpv();
		echo json_encode($data);
	}

	public function delSpv()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->Supervisor_model->delSpv($id);
		echo json_encode($data);
	}

	public function updateSpv()
	{
		# code...
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$passcode = $this->input->post('passcode');
		$result = $this->Supervisor_model->updateSpv($id,$nik,$nama,$passcode);
		echo json_encode($result);
	}

	// spv manager

	public function newSpvMan()
	{
		# code...
		// init
		$output = array('error' => false);

		// data new
		$data = array(
			'id_supervisor' => $this->input->post('id_supervisor'),
			'id_sisi' => $this->input->post('id_sisi')
		);
		// insert data new defect
		$result = $this->Supervisor_model->createSpvMan($data);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}
	public function getSpvManById()
	{
		# code...
		$data = $this->Supervisor_model->getSpvManById($this->input->post('id'));
		echo json_encode($data);
	}

	public function delSpvMan()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->Supervisor_model->delSpvMan($id);
		echo json_encode($data);

	}

}

/* End of file supervisor.php */
/* Location: ./application/controllers/supervisor.php */