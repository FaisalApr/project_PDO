<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdo_model extends CI_Model {

	public function cekpdoada($username,$shift,$tanggal)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user', $username);
		$this->db->where('user', $tanggal);
		
		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}
 

} 