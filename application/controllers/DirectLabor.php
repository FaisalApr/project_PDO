<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectLabor extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('DirectLabor_Model');
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
			$this->load->view('labor/direct', $data);
		}else {  
			// jika tidak punya data pdo
			redirect('Welcome','refresh');
		}
		
	}

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

	public function getAbsenPegawai()
	{
		# code...
		$data = $this->DirectLabor_Model->getAbsenPegawai();
		echo json_encode($data);
	}

	public function delAbsenPegawai()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->DirectLabor_Model->delAbsenPegawai($id);
		echo json_encode($data);
	}

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

	// =========== AJAX  =================

	public function anInsertActivity()
	{ 	
		echo json_encode($this->DirectLabor_Model->arrayInsertDirectActivity());
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */