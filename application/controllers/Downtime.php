<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downtime extends CI_Controller {

	public function index()
	{
		$this->load->view('downtime/downtime_template');
	}

}

/* End of file downtime.php */
/* Location: ./application/controllers/downtime.php */
