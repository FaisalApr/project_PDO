<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($u,$p)
	{ 
		$query = $this->db->query("SELECT users.id,username,level,id_shift,id_line,active,shift.keterangan,line.nama_line FROM users JOIN shift on users.id_shift=shift.id JOIN line on users.id_line=line.id WHERE users.username='$u' AND users.password='$p'"); 
		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}
 

} 