<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegulasiCode_model extends CI_Model {
	
	
	public function createRegulasiCode($data)
	{
		# code...
		return $this->db->insert('jenis_regulasi',$data);
	}



}

/* End of file regulasiCode_model.php */
/* Location: ./application/models/regulasiCode_model.php */