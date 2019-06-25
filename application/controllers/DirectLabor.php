<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectLabor extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('DirectLabor_Model');   
	}

	public function index()
	{
		$this->load->view('labor/direct');
	}




	// =========== AJAX  =================

	public function anInsertActivity()
	{ 	
		echo json_encode($this->DirectLabor_Model->arrayInsertDirectActivity());
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */