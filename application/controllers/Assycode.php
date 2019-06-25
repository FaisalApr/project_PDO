<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assycode extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('AssyCode_model');
	}

	public function index()
	{
		$this->load->view('assy/ac_template');
	}


// ===========   AJAX ===============
	public function newAssyCode()
	{
		# code... 
		// init
		$output = array('error' => false);

		//data new
		$dataAssyCode = array(
			'kode_assy' => $this->input->post('def_code'),
			'umh' => $this->input->post('def_umh')
		);

		// insert data new defect
		$result = $this->AssyCode_model->createAssyCode($dataAssyCode);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getAssyCode()
	{
		# code...
		$data = $this->AssyCode_model->getAcode();
		echo json_encode($data);
	}

	public function delAssyCode()
	{
		# code...
		$id = $this->input->post('id');

		$data = $this->AssyCode_model->delAcode($id);
		echo json_encode($data);
	}

	public function getAssyCodeDasboard()
	{
		$data = $this->AssyCode_model->getAcodeDasboard();
		echo json_encode($data);
	}
	public function updateAssyCode()
	{
		# code...
		$id = $this->input->post('id');
		$kode = $this->input->post('kode_assy');
		$umh = $this->input->post('umh');

		$result = $this->AssyCode_model->updateACode($id,$kode,$umh);
		echo json_encode($result);
	}

}

/* End of file assycode.php */
/* Location: ./application/controllers/assycode.php */