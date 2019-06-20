<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {
 
	public function index()
	{
		$this->load->view('dasboard/dasboard_home');
	}
}