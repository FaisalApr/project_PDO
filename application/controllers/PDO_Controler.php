<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDO_Controler extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pdo_model');
	}

	public function index()
	{
		
	}





//  ============ AJAX. =====================
	public function updateSpeed()
	{ 
		echo json_encode($this->Pdo_model->updateSpeedPdo());
	}



}

/* End of file pDO_Controler.php */
/* Location: ./application/controllers/pDO_Controler.php */