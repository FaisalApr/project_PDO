<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndirectLabor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('InDirectLabor_Model');
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
		$username = $session_data['id_user'];  
		$shift =  "1" ; 
		$tanggal = date("Y-m-d"); 

		// jika user sudah ada data pdo
		$result = $this->Pdo_model->cariPdo($username,$shift,$tanggal);
		if ($result) { 
			
			$data['pdo'] = $this->Pdo_model->cariPdoItems($username,$shift,$tanggal);
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
		echo json_encode($result);
	}

}

/* End of file indirectLabor.php */
/* Location: ./application/controllers/indirectLabor.php */