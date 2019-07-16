<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defect extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pdo_model');
		$this->load->model('OutputControl_model');
		$this->load->model('DirectLabor_Model');
		$this->load->model('Losstime_model');
		$this->load->model('Defect_model');

		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		// get sesion
		// $session_data = $this->session->userdata('pdo_logged'); 

		// init data
		// $iduser = $session_data['id_user'];  
		// $shift =  $session_data['id_shift'] ; 
		// $tanggal = date("Y-m-d"); 

		// jika user sudah ada data pdo
		// $result = $this->Pdo_model->cariPdo($iduser,$shift,$tanggal);
		// if ($result) { 
			
		// 	$pdo = $this->Pdo_model->cariPdoItems($iduser,$shift,$tanggal);
		// 	$data['pdo'] = $pdo;
			
		// 	$data['data_oc'] = $this->Defect_model->get_all_record_by_id($pdo->id);
			
		// 	$data['defect'] = $this->Defect_model->get_all_level();
		// 	$this->load->view('defect/defect_templ', $data);
		// }else {  
		// 	// jika tidak punya data pdo
		// 	redirect('Welcome','refresh');
		// }
		$this->load->view('defect/defect_templ');
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
		// refresh PDO
		$refresh = $this->Pdo_model->refreshData($this->input->post('def_id_pdo'));

		echo json_encode($output);
	}

	public function getDefectsUser()
	{
		# code...
		$id =$this->input->post('id_pdo');
		$data['alldefect'] = $this->Defect_model->getDefCodeUser($id);
		$data['dpm'] = $this->Defect_model->getDPM($id);
		$data['total'] = $this->Defect_model->getTotal($id);
		$data['list_defect'] = $this->Defect_model->get_all_level();

		echo json_encode($data);
	}

	public function delDefect()
	{
		# code...
		$id = $this->input->post('id');

		$data = $this->Defect_model->delDefects($id);
		// Refresh PDO
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));
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
		// Refresh PDO
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));

		echo json_encode($result);
	}

}

/* End of file defect_form.php */
/* Location: ./application/controllers/defect_form.php */