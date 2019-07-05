<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_model extends CI_Model {

	
	public function cekPasscode($p,$ln)
	{ 
		$query = $this->db->query("SELECT * FROM line JOIN supervisor on line.id_supervisor=supervisor.id WHERE line.id='$ln' AND supervisor.passcode='$p'"); 
		if ($query->num_rows()>0) {
			return $query->first_row();
		}else{
			return false;
		}
	}


}

/* End of file verifikasi_model.php */
/* Location: ./application/models/verifikasi_model.php */