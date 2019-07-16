<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_model extends CI_Model {

	
	public function cekPasscode($p,$pdo)
	{ 
		$query = $this->db->query("SELECT * 
									FROM main_pdo 
									JOIN spv_manager ON main_pdo.id_listcarline=spv_manager.id_list_carline AND main_pdo.id_shift=spv_manager.id_shift
									JOIN supervisor on spv_manager.id_supervisor=supervisor.id
									WHERE main_pdo.id=$pdo AND supervisor.passcode='$p'"); 
		if ($query->num_rows()>0) {
			return $query->first_row();
		}else{
			return false;
		}
	}

	public function cariNotVerif($date,$user)
	{
		$query = $this->db->query("SELECT * FROM main_pdo WHERE status=0 AND id_users=$user AND date(tanggal)<date('$date')");

		if ($query->num_rows()>0) {
			return $query->first_row();
		}else{
			return false;
		}
	}

}

/* End of file verifikasi_model.php */
/* Location: ./application/models/verifikasi_model.php */