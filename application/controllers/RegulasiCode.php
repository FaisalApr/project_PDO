<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegulasiCode extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('DefectCode_model');
	}

	public function index()
	{
		$this->load->view('code/regulasiCode_');
	}

	public function newRegulasiCode()
	{
		# code...
		// init
		$output = array('error' => false);
		
		//data new
		$dataDefectCode = array(
			'code' => $this->input->post('def_code'),
			'keterangan' => $this->input->post('def_ket')
		);

		// insert data new defect
		$result = $this->DefectCode_model->createDefectCode($dataDefectCode);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);

	}
}

/* End of file regulasiCode.php */
/* Location: ./application/controllers/regulasiCode.php */