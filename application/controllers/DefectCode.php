<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DefectCode extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('DefectCode_model');
	}

	public function index()
	{
		$this->load->view('defect/dc_template');
	}

	public function newDefectCode()
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

	public function getDefectCode()
	{
		# code...
		$data= $this->DefectCode_model->getDcode();
		echo json_encode($data);
	}

	public function delDefectCode()
	{
		# code...
		$id = $this->input->post('id');

		$data = $this->DefectCode_model->delDcode($id);
			echo json_encode($data);
	}

	public function updateDefectCode()
	{
		# code...
		$id = $this->input->post('id');
		$kode = $this->input->post('code');
		$ket = $this->input->post('keterangan');
		$result = $this->DefectCode_model->updateDcode($id,$kode,$ket);
		echo json_encode($result);
	}

}

/* End of file defectCode.php */
/* Location: ./application/controllers/defectCode.php */