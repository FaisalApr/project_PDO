<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('LineModel');
	}

	public function index()
	{
		$this->load->view('Line/Line_temp');
	}

}

/* End of file line.php */
/* Location: ./application/controllers/line.php */