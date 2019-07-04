<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('LineModel');
	}

	public function index()
	{
		$this->load->view('Line/Line_temp');
	}

	public function newLine()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataLine = array(
			'nama_line' => $this->input->post('nama_line')
		);

		// insert data new defect
		$result = $this->LineModel->createLine($dataLine);
		if($result){
			$output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getLine()
	{
		# code...
		$data = $this->LineModel->getLine();
		echo json_encode($data);
	}

	public function delLine()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->LineModel->delLine($id);
		echo json_encode($data);
	}

	public function updateLine()
	{
		# code...
		$id = $this->input->post('id');
		$nama = $this->input->post('nama_line');
		$result = $this->LineModel->updateLine($id,$nama);
		echo json_encode($result);
	}

}

/* End of file line.php */
/* Location: ./application/controllers/line.php */