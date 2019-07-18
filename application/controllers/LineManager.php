<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineManager extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('LineManagerModel');
		
	}

	public function index()
	{
		// $data['data_line'] = $this->LineManagerModel->getLine();
		// $data['data_assy'] = $this->LineManagerModel->getAssy();
		// $this->load->view('LineManager/LineMgr', $data);
		$this->load->view('Line/Line_temp');
	}

	public function newLM()
	{
		# code...
		// init
		$output = array('error' => false);

		// data new
		$dataLM = array(
			'id_line' => $this->input->post('id_line'),
			'id_assy' => $this->input->post('id_assy')
		);
		// insert data new defect
		$result = $this->LineManagerModel->create($dataLM);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}


	public function getUser()
	{
		# code...
		$data= $this->LineManagerModel->getRecord();
		echo json_encode($data);
	}

	public function delLM()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->LineManagerModel->delete($id);
		echo json_encode($data);
	}

	public function updateLM()
	{
		# code...
		$id = $this->input->post('id');
		$id_line = $this->input->post('id_line');
		$id_assy = $this->input->post('id_assy');

		$result = $this->LineManagerModel->update($id,$id_line,$id_assy);
		echo json_encode($result);
	}

	public function getAssByLine()
	{
		# code...
		$data = $this->LineManagerModel->getRecordById($this->input->post('id'));
		echo json_encode($data);
	}
	public function getLineManById()
	{
		# code...
		$data = $this->LineManagerModel->getLineManById($this->input->post('id'));
		echo json_encode($data);
	}

}

/* End of file lineManager.php */
/* Location: ./application/controllers/lineManager.php */