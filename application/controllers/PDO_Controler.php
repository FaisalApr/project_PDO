<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDO_Controler extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pdo_model');
		$this->load->model('OutputControl_model');
		$this->load->model('DirectLabor_Model');
		$this->load->model('Losstime_model');
		$this->load->model('Defect_model');
	}

	public function index()
	{
		
	}





//  ============ AJAX. =====================
	public function updateSpeed()
	{ 
		$res = $this->Pdo_model->updateSpeedPdo();
		$refresh = $this->Pdo_model->refreshData($this->input->post('id'));

		echo json_encode($res);
	}
 


}

/* End of file pDO_Controler.php */
/* Location: ./application/controllers/pDO_Controler.php */