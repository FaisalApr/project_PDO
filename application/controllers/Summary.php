<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pdo_model');  
		$this->load->model('Summary_model');
		// jika tidak memiliki sesi		
		// if (!$this->session->userdata('pdo_logged')) {
		// 	redirect('Login','refresh');
		// }		 
	}

	public function index()
	{ 
		// get sesion
		$session_data = $this->session->userdata('pdo_logged'); 

		// init data
		$username = $session_data['id_user'];  
		$shift =  $session_data['id_shift'];
		$tanggal = date("Y-m-d"); 
 		
 		// jika user sudah ada data pdo
		$result = $this->Pdo_model->cariPdo($username,$shift,$tanggal);
		if ($result) { 
			
			$data['pdo'] = $this->Pdo_model->cariPdoItems($username,$shift,$tanggal);
			$this->load->view('summary/sum_user',$data);
		}else {  
			// jika tidak punya data pdo
			redirect('Welcome','refresh');
		}
		
	}


	// EFFective
		public function getThisMonthEffA()
		{
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 
	 
			// get date now
			$dat = $this->input->post('tgl');
			$line = $session_data['id_line']; 
			$shift =  'A';

			$data = $this->Pdo_model->getDataByline($dat,$line,$shift);
			echo json_encode($data);
		}

		public function getThisMonthEffB()
		{
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 
	 
			// get date now
			$dat = $this->input->post('tgl');
			$line = $session_data['id_line']; 
			$shift =  'B';

			$data = $this->Pdo_model->getDataByline($dat,$line,$shift);
			echo json_encode($data);
		}

	// PRODUCTION PLAN & RESULT
		public function getTotActPlanProductA()
		{
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 

			$line = $session_data['id_line'];
			$shift = 'A';
			$tanggal = $this->input->post('tgl');

			$result = $this->Summary_model->getTotalPlanActualPerShifLine($line,$shift,$tanggal);

			echo json_encode($result);
		}

		public function getTotActPlanProductB()
		{
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 

			// $line = $this->input->post('line');//
			$line = $session_data['id_line'];
			$shift = 'B';
			$tanggal = $this->input->post('tgl');

			$result = $this->Summary_model->getTotalPlanActualPerShifLine($line,$shift,$tanggal);

			echo json_encode($result);
		}

		public function getProdBalance()
		{
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 

			$line = $session_data['id_line']; //$this->input->post('line');
			// $tanggal = '2019-7-3';//
			$tanggal = (string)$this->input->post('tanggal');

			$result = $this->Summary_model->hitungBalance($line,$tanggal); 

			echo json_encode($result);
		}
	
	// INTERNAL DEFFECT
		public function getDataPerPdoA()
		{
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 

			$line = $session_data['id_line'];
			$shift = 'A';
			// $tanggal = '2019-7-3';//
			$tanggal = $this->input->post('tgl');

			$result = $this->Pdo_model->getDataByLineWaktuShift($line,$tanggal,$shift); 

			echo json_encode($result);			
		}

		public function getDataPerPdoB()
		{
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 

			$line = $session_data['id_line'];
			$shift = 'B';
			// $tanggal = '2019-7-3';//
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
			// get sesion
			$session_data = $this->session->userdata('pdo_logged'); 

			$line = $session_data['id_line']; 
			$tanggal = $this->input->post('tgl');

			$result = $this->Summary_model->getTopDeffectMonthly($tanggal); 
			echo json_encode($result);			
		}

}

/* End of file summary.php */
/* Location: ./application/controllers/summary.php */