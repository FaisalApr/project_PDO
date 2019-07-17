<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndirectLabor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('InDirectLabor_Model');
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
		$session_data = $this->session->userdata('pdo_logged'); 

		// init data
		$iduser = $session_data['id_user'];  
		$shift =  $session_data['id_shift'] ; 
		$tanggal = date("Y-m-d"); 

		// jika user sudah ada data pdo
		$result = $this->Pdo_model->cariPdo($iduser,$shift,$tanggal);
		if ($result) { 
			
			$data['pdo'] = $this->Pdo_model->cariPdoItems($iduser,$shift,$tanggal);
			$this->load->view('labor/indirect', $data);
		}else {  
			// jika tidak punya data pdo
			redirect('Welcome','refresh');
		}
		
	}

	public function newAbsenLeader()
	{
		# code...
		// init
		$output = array('error' => false);
		$total = ($this->input->post('qty')*$this->input->post('jam'));
		//data new
		$dataAbsenLeader = array(
			'id_pdo' => $this->input->post('id_pdo'),
			'item' => $this->input->post('item'),
			'qty' => $this->input->post('qty'),
			'jam' => $this->input->post('jam'),
			'total' => $total
		);

		// insert data absen
		$result = $this->InDirectLabor_Model->createAbsenLeader($dataAbsenLeader);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));
		echo json_encode($output);
	}

	public function getAbsenLeader()
	{
		# code...
		$data = $this->InDirectLabor_Model->getAbsenLeader();
		echo json_encode($data);
	}

	public function delAbsenLeader()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->InDirectLabor_Model->delAbsenLeader($id);
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));
		echo json_encode($data);
	}

	public function updateAbsenLeader()
	{
		# code...
		$id = $this->input->post('id');
		$item = $this->input->post('item');
		$qty = $this->input->post('qty');
		$jam = $this->input->post('jam');
		$total = ($this->input->post('qty')*$this->input->post('jam'));

		$result = $this->InDirectLabor_Model->updateAbsenLeader($id,$item,$qty,$jam,$total);
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));
		echo json_encode($result);
	}

	public function editIDL()
	{
		# code...
		$pdo = $this->input->post('id_pdo');
		$mhot = ($this->input->post('jam_ot')*$this->input->post('dl_ot'));
		$mhreg = ($this->input->post('reg_dl')*8);

		$dataIDL = array( 
				'std_idl' => $this->input->post('std_dl'),
	            'reg_idl' => $this->input->post('reg_dl'),
	            'jam_ot' => $this->input->post('jam_ot'),
	            'dl_ot'  => $this->input->post('dl_ot'),
	            'mh_reg' => $mhreg ,
	            'mh_ot'  => $mhot,
	            'total' => ($mhreg+$mhot)
	        );
		$result = $this->InDirectLabor_Model->updateIDL($dataIDL,$pdo);

		echo json_encode($dataIDL);
	}

	public function getIndirectLabor()
	{
		# code...
		$result['mhInIdl'] = $this->OutputControl_model->getMHin_idl($this->input->post('id_pdo'))->mh_in_idl;
		$result['data'] = $this->InDirectLabor_Model->getIDL();
		echo json_encode($result);
	}

}

/* End of file indirectLabor.php */
/* Location: ./application/controllers/indirectLabor.php */