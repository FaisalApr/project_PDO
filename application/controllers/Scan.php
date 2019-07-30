<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Pdo_model');
		$this->load->model('OutputControl_model');
		$this->load->model('DirectLabor_Model');
		$this->load->model('Losstime_model');
		$this->load->model('Defect_model');   
		$this->load->model('LineManagerModel');
		$this->load->model('AssyCode_model');
		$this->load->model('ScanAssy');
	}

	public function index()
	{
		$this->load->view('Scan/scan');
	}
	public function getIdBuild()
	{
	
		# code...
		$kode_assy = $this->input->post('kode_assy');
		$id_pdo = $this->input->post('id_pdo');
		$id_oc = $this->input->post('id_oc');
		$result = $this->ScanAssy->getIdBuild($kode_assy,$id_pdo,$id_oc);

		echo json_encode($result);
	}
	
}

/* End of file Scan.php */
/* Location: ./application/controllers/Scan.php */