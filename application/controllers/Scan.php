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
		$data_scan = $this->input->post('data_scan');
		$id_pdo = $this->input->post('id_pdo');
		$id_oc = $this->input->post('id_oc');
		$out['error'] = false;

		// Mencari Format Data Scan
		$d_format = $this->ScanAssy->cariFormatCarline($id_pdo);		
		if ($d_format) {
			// Format memeccah isi string
			$data_scan = substr($data_scan, $d_format->format_start, $d_format->format_end);
		}else{
			$out['info'] = 'Format Data Assy Tidak Ditemukan'; 
			$out['error'] = true; 
		}

		// mencari data build
		$result = $this->ScanAssy->getIdBuild($data_scan,$id_pdo,$id_oc);
		if ($result) {
			$act = ($result->actual+1);
			$update = $this->OutputControl_model->updateBuildAssyByScan($result->id_build,$act);
			$out['info'] = 'Actual Berhasil Ditambah'; 
		}else{
			$out['info'] = 'Data Assy Tidak Ditemukan'; 
			$out['error'] = true;
		}
		
		$refresh = $this->Pdo_model->refreshData($id_pdo);

		echo json_encode($out);
	}
	
}

/* End of file Scan.php */
/* Location: ./application/controllers/Scan.php */