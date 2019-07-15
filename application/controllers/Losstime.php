<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Losstime extends CI_Controller {

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
		$ses_opt = $this->session->userdata('pdo_opt'); 

		// init data
		$line = $ses_opt['id_line'];  
		$shift =  $ses_opt['id_shift'];
		$tanggal = $ses_opt['tgl'];  

		$pdo = $this->Pdo_model->getDataByline($tanggal,$line,$shift);
		$data['pdo'] = $pdo;
		// $data['data_oc'] = $this->Losstime_model->get_all_record_by_id($pdo->id);
		$data['data_error'] = $this->Losstime_model->get_all_errRecord();
		$data['data_losttime'] = $this->Losstime_model->get_all_level();
		$this->load->view('downtime/downtime_template', $data);
	}


// 	++++++++++    AJAX    ++++++++++++++

	public function cari_jam_ocPDO()
	{
		$id_p = $this->input->post('id_pdo');
		
		$data = $this->Losstime_model->get_all_record_by_id($id_p);

		echo json_encode($data);
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
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		// refresh Pdo
		$refresh = $this->Pdo_model->refreshData($this->input->post('down_id_pdo'));

		echo json_encode($output);
	}

	public function getLosstimeUser()
	{
		# code...
		$id =$this->input->post('id_pdo');
		$data['data_downtime'] = $this->Losstime_model->getLosstimeUserrrr($id);
		$data['widgettt'] = $this->Losstime_model->getLosstimeWidget($id);
		$data['pdo'] = $this->Pdo_model->pdoById($id); 
		echo json_encode($data);
	}

	public function delLosstime()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->Losstime_model->delLosstime($id);

		// refresh Pdo
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));

		echo json_encode($data);
	}
	public function updateLosstime()
	{
		# code...
		$id = $this->input->post('id');
		$id_error = $this->input->post('id_error');
		$id_oc = $this->input->post('id_oc');
		$id_jenisloss = $this->input->post('id_jenisloss');
		$keterangan = $this->input->post('keterangan');
		$durasi = $this->input->post('durasi');


		$result = $this->Losstime_model->updateLosstime($id,$id_error,$id_oc,$id_jenisloss,$keterangan,$durasi);

		// refresh Pdo
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));
		
		echo json_encode($result);
	}

	public function cariLossTime()
	{
		$id_oc = $this->input->post('id_oc');

		$result = $this->Losstime_model->findLossTimeByOc($id_oc);
		
		echo json_encode($result);		
	}

}

/* End of file downtime.php */
/* Location: ./application/controllers/downtime.php */
