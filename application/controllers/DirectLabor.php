<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectLabor extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Pdo_model');
		$this->load->model('OutputControl_model');
		$this->load->model('DirectLabor_Model');
		$this->load->model('Losstime_model');
		$this->load->model('Defect_model');

		// if (!$this->session->userdata('pdo_logged')) {
		// 	redirect('Login','refresh');
		// }   
	}

	public function index()
	{
		// // get sesion
		// $session_data = $this->session->userdata('pdo_logged'); 

		// // init data
		// $iduser = $session_data['id_user'];  
		// $shift =  $session_data['id_shift'] ;  
		// $tanggal = date("Y-m-d"); 

		// // jika user sudah ada data pdo
		// $result = $this->Pdo_model->cariPdo($iduser,$shift,$tanggal);
		// if ($result) { 
			
		// 	$pdo = $this->Pdo_model->cariPdoItems($iduser,$shift,$tanggal);
			
		// 	$data['pdo'] = $pdo;
		// 	$data['data_oc'] = $this->DirectLabor_Model->getRecordById($pdo->id);

		// 	$this->load->view('labor/direct', $data);
		// }else {  
		// 	// jika tidak punya data pdo
		// 	redirect('Welcome','refresh');
		// }
		$this->load->view('labor/direct');
		
	}

// absen pegawai
   
   // create
	public function newAbsenPegawai()
	{

		# code...
		// init
		$output = array('error' => false);
		$total = ($this->input->post('qty')*$this->input->post('jam'));
		//data new
		$dataAbsenPegawai = array(
			'id_pdo' => $this->input->post('id_pdo'),
			'item' => $this->input->post('item'),
			'qty' => $this->input->post('qty'),
			'jam' => $this->input->post('jam'),
			'total' => $total
		);
		// insert data absen
		$result = $this->DirectLabor_Model->createAbsenPegawai($dataAbsenPegawai);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	// read
	public function getAbsenPegawai()
	{
		# code...
		$data = $this->DirectLabor_Model->getAbsenPegawai();
		echo json_encode($data);
	}

	//delete 
	public function delAbsenPegawai()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->DirectLabor_Model->delAbsenPegawai($id);
		echo json_encode($data);
	}

	// update
	public function updateAbsenPegawai()
	{
		# code...
		$id = $this->input->post('id');
		$item = $this->input->post('item');
		$qty = $this->input->post('qty');
		$jam = $this->input->post('jam');
		$total = ($this->input->post('qty')*$this->input->post('jam'));
		$result = $this->DirectLabor_Model->updateAbsenPegawai($id,$item,$qty,$jam,$total);
		echo json_encode($result);
	}

// regulasi in

	// create
	public function newRegIn()
	{
		# code...
		// init
		$output = array('error' => false);
		// data new
		$total = ($this->input->post('qty')*$this->input->post('jam'));
		$dataRegIn = array(
			'id_pdo' => $this->input->post('id_pdo'),
			'id_jenisreg' => $this->input->post('id_jenisreg'),
			'id_oc' => $this->input->post('id_oc'),
			'posisi' => $this->input->post('posisi'),
			'qty' => $this->input->post('qty'),
			'jam' => $this->input->post('jam'),
			'total' => $total
		);

		// insert data RegIn
		$result = $this->DirectLabor_Model->createRegIn($dataRegIn);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	// read
	public function getRegIn()
	{
		# code...
		$id = $this->input->post('id_pdo');
		$data = $this->DirectLabor_Model->getRegIn($id);
		echo json_encode($data);
	}

	// delete
	public function delRegIn()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->DirectLabor_Model->delRegIn($id);
		echo json_encode($data);
	}

	// update
	public function updateRegIn()
	{
		# code...
		$id = $this->input->post('id');
		$id_jenisreg = 1;
		$id_oc = $this->input->post('id_oc');
		$posisi = $this->input->post('posisi');
		$qty = $this->input->post('qty');
		$jam = $this->input->post('jam');
		$total = ($this->input->post('qty')*$this->input->post('jam'));

		$result = $this->DirectLabor_Model->updateRegIn($id,$id_jenisreg,$id_oc,$posisi,$qty,$jam,$total);
		echo json_encode($result);

	}

// regulasi out

	// create
	public function newRegOut()
	{
		# code...
		// init
		$output = array('error' => false);
		// data new
		$total = ($this->input->post('qty')*$this->input->post('jam'));
		$dataRegOut = array(
			'id_pdo' => $this->input->post('id_pdo'),
			'id_jenisreg' => $this->input->post('id_jenisreg'),
			'id_oc' => $this->input->post('id_oc'),
			'posisi' => $this->input->post('posisi'),
			'qty' => $this->input->post('qty'),
			'jam' => $this->input->post('jam'),
			'total' => $total
		);

		// insert data RegIn
		$result = $this->DirectLabor_Model->createRegOut($dataRegOut);
		if($result){
			// $output ['status'] = "ok";
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	// read
	public function getRegOut()
	{
		# code...
		$id = $this->input->post('id_pdo');
		$data = $this->DirectLabor_Model->getRegOut($id);
		echo json_encode($data);
	}

	// delete
	public function delRegOut()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->DirectLabor_Model->delRegOut($id);
		echo json_encode($data);
	}

	// update
	public function updateRegOut()
	{
		# code...
		$id = $this->input->post('id');
		$id_jenisreg = 2;
		$id_oc = $this->input->post('id_oc');
		$posisi = $this->input->post('posisi');
		$qty = $this->input->post('qty');
		$jam = $this->input->post('jam');
		$total = ($this->input->post('qty')*$this->input->post('jam'));

		$result = $this->DirectLabor_Model->updateRegOut($id,$id_jenisreg,$id_oc,$posisi,$qty,$jam,$total);
		echo json_encode($result);

	}

// Direct Act

// Edit DIRECT LABOR
	public function editDl()
	{
		$pdo = $this->input->post('id_pdo');
		$mhot = ($this->input->post('jam_ot')*$this->input->post('dl_ot'));
		$mhreg = ($this->input->post('reg_dl')*8);

		$dataDl = array( 
				'std_dl' => $this->input->post('std_dl'),
	            'reg_dl' => $this->input->post('reg_dl'),
	            'jam_ot' => $this->input->post('jam_ot'),
	            'dl_ot'  => $this->input->post('dl_ot'),
	            'mh_reg' => $mhreg ,
	            'mh_ot'  => $mhot,
	            'total' => ($mhreg+$mhot)
	        );
		$result = $this->DirectLabor_Model->updateDL($dataDl,$pdo);

		echo json_encode($result);
	}



// =========== AJAX  =================

	public function anInsertActivity()
	{ 	
		echo json_encode($this->DirectLabor_Model->arrayInsertDirectActivity());
	}


	public function getDirectLabor()
	{
		$pdo = $this->input->post('id_pdo');
		echo json_encode($this->DirectLabor_Model->getDl($pdo));
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */