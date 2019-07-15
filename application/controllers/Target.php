<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Target_model');
		date_default_timezone_set("Asia/Jakarta");

		// jika tidak memiliki sesi		
		// if (!$this->session->userdata('pdo_logged')) {
		// 	redirect('Login','refresh');
		// }
	}

	


// ==========  AJAX.   =============
  
	public function getThisMonth()
	{ 
		$dat = $this->input->post('tgl');
		$line = $this->input->post('line');
		// $line = $this->input->post('line');

		$data = $this->Target_model->getDataMonth($dat,$line);

		echo json_encode($data);
	}


	public function newTargetBulan()
	{ 

		//data new
		$datanew = array(
			'id_list_carline'	=> $this->input->post('id_cline'),
			'mh_out'	=> $this->input->post('out'),
			'mh_in' 	=> $this->input->post('in'),
			'efisiensi' => $this->input->post('eff'),
			'periode'	=> $this->input->post('tgl'),
			'plan_assy' => $this->input->post('plan')
		);

		$result = $this->Target_model->newTarget($datanew);
		echo json_encode($result);
	}

	public function editMhOut()
	{
		
		$dataedit = array( 
			'mh_out'	=> $this->input->post('out')
		);

		$result = $this->Target_model->edittarget($dataedit);
		echo json_encode($result);	
	}

	public function editMhIn()
	{
		
		$dataedit = array( 
			'mh_in'	=> $this->input->post('in')
		);

		$result = $this->Target_model->edittarget($dataedit);
		echo json_encode($result);	
	}

	public function editEff()
	{
		
		$dataedit = array( 
			'efisiensi'	=> $this->input->post('eff')
		);

		$result = $this->Target_model->edittarget($dataedit);
		echo json_encode($result);	
	}



}

/* End of file target.php */
/* Location: ./application/controllers/target.php */