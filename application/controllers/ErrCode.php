<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrCode extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ErrorCode_model');

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
		
		$this->load->view('code/errcode_');
	}

	public function newErrorCode()
	{
		# code...
		// init
		$output = array('error' => false);

		// data new
		$dataErrorCode = array(
			'kode' => $this->input->post('def_code'),
			'keterangan' => $this->input->post('def_ket')
		);

		// insert data new defect
		$result = $this->ErrorCode_model->createErrorCode($dataErrorCode);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getErrorCode()
	{
		# code...
		$data = $this->ErrorCode_model->getEcode();
		echo json_encode($data);
	}

	public function delErrorCode()
	{
		# code...
		$id = $this->input->post('id');

		$data = $this->ErrorCode_model->delEcode($id);
			echo json_encode($data);
	}

	public function updateErrorCode()
	{
		# code...
		$id = $this->input->post('id');
		$kode = $this->input->post('code');
		$ket = $this->input->post('keterangan');
		$result = $this->ErrorCode_model->updateEcode($id,$kode,$ket);
		echo json_encode($result);
	}
}

/* End of file errCode.php */
/* Location: ./application/controllers/errCode.php */