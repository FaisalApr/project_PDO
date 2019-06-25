<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Losstime extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Losstime_model');
		$this->load->model('Pdo_model');
		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		// get sesion
		$session_data = $this->session->userdata('pdo_logged'); 

		// init data
		$iduser = $session_data['id_user'];  
		$shift =  "1" ; 
		$tanggal = date("Y-m-d"); 

		$result = $this->Pdo_model->cariPdo($iduser,$shift,$tanggal);
		if ($result) { 
			
			$pdo = $this->Pdo_model->cariPdoItems($iduser,$shift,$tanggal);
			$data['pdo'] = $pdo;
			$data['data_oc'] = $this->Losstime_model->get_all_record_by_id($pdo->id);
			$data['data_error'] = $this->Losstime_model->get_all_errRecord();
			$data['data_losttime'] = $this->Losstime_model->get_all_level();
			$this->load->view('downtime/downtime_template', $data);
		}else {  
			// jika tidak punya data pdo
			redirect('Welcome','refresh');
		}
	}

	public function newLosstime()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataLosstime = array(
			'id_pdo' => $this->input->post('down_id_pdo'),
			'id_error' => $this->input->post('down_id_error'),
			'id_oc' => $this->input->post('down_id_oc'),
			'id_jenisloss' => $this->input->post('down_id_jenisloss'),
			'keterangan' => $this->input->post('down_ket'),
			'durasi' => $this->input->post('down_durasi'),
			
		);

		// insert data new defect
		$result = $this->Losstime_model->createLosstime($dataLosstime);
		if($result){
			$output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getLosstimeUser()
	{
		# code...
		$id =$this->input->post('id_pdo');
		$data = $this->Losstime_model->getLosstimeUserrrr($id);

		echo json_encode($data);
	}

	public function delLosstime()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->Losstime_model->delLosstime($id);
		echo json_encode($data);
	}

}

/* End of file downtime.php */
/* Location: ./application/controllers/downtime.php */
