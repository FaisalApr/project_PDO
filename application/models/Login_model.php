<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($u,$p)
	{ 
		$query = $this->db->query(" SELECT *,users.id as id_usr
									FROM users 
									JOIN shift on users.id_shift=shift.id 
									WHERE users.username='$u' AND users.password='$p'"); 
		if ($query->num_rows()>0) {
			return $query->first_row();
		}else{
			return false;
		}
	}
 

} 