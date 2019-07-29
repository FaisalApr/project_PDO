<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pdo_model');  
		$this->load->model('Summary_model');
		$this->load->model('Target_model');
		// jika tidak memiliki sesi		
		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}		 
	}

	public function index()
	{   
		$this->load->view('summary/sum_user'); 
	}


	// EFFective
		public function getThisMonthEffA()
		{  
			// get date now
			$dat = $this->input->post('tgl');
			$line = $this->input->post('id_line');
			$shift =  '1'; 

			$data = $this->Pdo_model->getDataBylin($dat,$line,$shift);
			echo json_encode($data);
		}

		public function getThisMonthEffB()
		{
			// get date now
			$dat = $this->input->post('tgl');
			$line = $this->input->post('id_line');
			$shift =  '2'; 

			$data = $this->Pdo_model->getDataBylin($dat,$line,$shift);
			echo json_encode($data);
		}

	// PRODUCTION PLAN & RESULT
		public function getTotActPlanProductA()
		{ 
			$line = $this->input->post('id_line');
			$shift = '1';
			$tanggal = $this->input->post('tgl');

			$result = $this->Summary_model->getTotalPlanActualPerShifLine($line,$shift,$tanggal);

			echo json_encode($result);
		}

		public function getTotActPlanProductB()
		{
			$line = $this->input->post('id_line');
			$shift = '2';
			$tanggal = $this->input->post('tgl');

			$result = $this->Summary_model->getTotalPlanActualPerShifLine($line,$shift,$tanggal);

			echo json_encode($result);
		}

		public function getProdBalance()
		{ 
			$line = $this->input->post('id_line');  
			$tanggal = $this->input->post('tanggal');

			$result['all'] = $this->Summary_model->hitungBalance($line,$tanggal); 
			$result['balance'] = $this->Target_model->getDataProdBalance($tanggal,$line); 

			echo json_encode($result);
		}
	
	// INTERNAL DEFFECT
		public function getDataPerPdoA()
		{
			$line = $this->input->post('id_line');
			$shift = '1'; 
			$tanggal = $this->input->post('tgl');

			$result = $this->Pdo_model->getDataByLineWaktuShift($line,$tanggal,$shift); 

			echo json_encode($result);			
		}

		public function getDataPerPdoB()
		{
			$line = $this->input->post('id_line');
			$shift = '2'; 
			$tanggal = $this->input->post('tgl');

			$result = $this->Pdo_model->getDataByLineWaktuShift($line,$tanggal,$shift); 

			echo json_encode($result);			
		}

		public function getDataQCPerPdo()
		{
			$id = $this->input->post('id');

			$result = $this->Summary_model->getQualityByIdPdo($id); 

			echo json_encode($result);	
		}

		// get top global defect
		public function getTopDefect()
		{  

			$line = $this->input->post('id_line');
			$tanggal = $this->input->post('tgl');

			$result = $this->Summary_model->getTopDeffectMonthly($tanggal,$line); 
			echo json_encode($result);			
		}

}

/* End of file summary.php */
/* Location: ./application/controllers/summary.php */