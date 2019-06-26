<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defect extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Defect_model');
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

		// jika user sudah ada data pdo
		$result = $this->Pdo_model->cariPdo($iduser,$shift,$tanggal);
		if ($result) { 
			
			$pdo = $this->Pdo_model->cariPdoItems($iduser,$shift,$tanggal);
			$data['pdo'] = $pdo;
			$data['data_oc'] = $this->Defect_model->get_all_record_by_id($pdo->id);
			$data['defect'] = $this->Defect_model->get_all_level();
			$this->load->view('defect/defect_templ', $data);
		}else {  
			// jika tidak punya data pdo
			redirect('Welcome','refresh');
		}

	}

	public function newDefect()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataDefect = array(
			'id_pdo' => $this->input->post('def_id_pdo'),
			'id_oc' => $this->input->post('def_id_oc'),
			'id_jenisdeffect' => $this->input->post('def_id_jenisdeffect'),
			'keterangan' => $this->input->post('def_ket'),
			'total' => $this->input->post('def_total') 
		);

		// insert data new defect
		$result = $this->Defect_model->createDefect($dataDefect);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			// $output['error'] = true;j
		}
		echo json_encode($output);
	}

	public function getDefectsUser()
	{
		# code...
		$id =$this->input->post('id_pdo');
		$data = $this->Defect_model->getDefCodeUser($id);

		echo json_encode($data);
	}

	public function delDefect()
	{
		# code...
		$id = $this->input->post('id');

		$data = $this->Defect_model->delDefects($id);
		echo json_encode($data);

	}

	public function updateDefect()
	{
		# code...
		$id = $this->input->post('id');
		$id_oc = $this->input->post('id_oc');
		$id_jenisdeffect = $this->input->post('id_jenisdeffect');
		$keterangan = $this->input->post('keterangan');
		$total = $this->input->post('total');

		$result = $this->Defect_model->updateDefect($id,$id_oc,$id_jenisdeffect,$keterangan,$total);
		echo json_encode($result);
	}

}

/* End of file defect_form.php */
/* Location: ./application/controllers/defect_form.php */