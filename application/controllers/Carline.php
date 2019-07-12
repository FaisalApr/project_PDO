<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carline extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('CarlineModel');
	}

	public function index()
	{
		$data['data_com'] = $this->CarlineModel->get_all_level();
		$data['data_line'] = $this->CarlineModel->get_all_level_2();
		$this->load->view('carline/carline_v', $data);	
	}

// carline
	public function newCarline()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataCarline = array(
			'id_district' => $this->input->post('id_district'),
			'nama_carline' => $this->input->post('nama_carline')
		);

		// insert data new Line
		$result = $this->CarlineModel->createCarline($dataCarline);
		if($result){
			// $output ['status'] = "ok";
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getCarline()
	{
		# code...
		$data = $this->CarlineModel->getCarline();
		echo json_encode($data);
	}

	public function updateCarline()
	{
		# code...
		$id = $this->input->post('id');
		$id_district = $this->input->post('id_district');
		$nama_carline = $this->input->post('nama_carline');
		$result = $this->CarlineModel->updateCarline($id,$nama_carline,$id_district);
		echo json_encode($result);
	}

	public function delCarline()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->CarlineModel->delCarline($id);
		echo json_encode($data);
	}

// detail carline

	public function newLC()
	{
		# code...
		// init
		$output = array('error' => false);

		// data new
		$data_LC = array(
			'id_carline' => $this->input->post('id_carline'),
			'id_line' => $this->input->post('id_line')
		);
		// insert data new defect
		$result = $this->CarlineModel->create($data_LC);
		if($result){
			$output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getUserById()
	{
		# code...
		$data = $this->CarlineModel->getRecordById($this->input->post('id'));
		echo json_encode($data);
	}

	public function getListById()
	{
		# code...
		$data = $this->CarlineModel->getListById($this->input->post('id'));
		echo json_encode($data);
	}
	public function delLC()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->CarlineModel->delete($id);
		echo json_encode($data);
	}
	public function getLine()
	{
		# code...
		$data = $this->CarlineModel->getLine();
		echo json_encode($data);
	}

}

/* End of file carline.php */
/* Location: ./application/controllers/carline.php */