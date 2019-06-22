<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InDirectLabor_Model extends CI_Model {
 
	public function createIDL($data)
	{ 
		return $this->db->insert('indirect_labor', $data);
	}
 

} 