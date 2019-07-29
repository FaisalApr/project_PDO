<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineManager extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('LineManagerModel');
		
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
		
		$this->load->view('lineManager/Line_mgr');
	}

	public function newLM()
	{ 
		// init
		$output['error'] = false;

		$crline = $this->input->post('id_carline');
		$arr_mgr = $this->input->post('assymgr');
		
		$err = array();
		foreach ($arr_mgr as $key => $value) {
			$dataLM = array(
				'id_list_carline' => $crline,
				'id_assy' => $value
			);
			$res = $this->LineManagerModel->create($dataLM);
			if (!$res) {
				array_push($err, $dataLM );
				$output['error'] = true;
			}
		}
		$output['lst_err'] = $err;

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