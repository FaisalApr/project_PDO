<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectLabor_Model extends CI_Model {
 
	public function createDL($data)
	{ 
		return $this->db->insert('direct_labor', $data);
	}
 

} 