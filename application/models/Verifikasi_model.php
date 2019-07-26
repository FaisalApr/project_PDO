<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_model extends CI_Model {

	
	public function cekPasscode($p,$pdo)
	{ 
		$query = $this->db->query("SELECT * 
									FROM main_pdo 
									JOIN spv_manager ON main_pdo.id_listcarline=spv_manager.id_list_carline
									JOIN supervisor on spv_manager.id_supervisor=supervisor.id
									WHERE main_pdo.id=$pdo AND supervisor.passcode='$p'"); 
		if ($query->num_rows()>0) {
			return $query->first_row();
		}else{
			return false;
		}
	}

	public function cariNotVerif($date,$lstcr,$sf)
	{
		$query = $this->db->query("SELECT *,date(tanggal) as tgl FROM main_pdo WHERE status=0 AND id_listcarline=$lstcr AND id_shift=$sf AND date(tanggal)<date('$date')");

		if ($query->num_rows()>0) {
			return $query->first_row();
		}else{
			return false;
		}
	}

	public function cariAssyUmh0($ln,$sf)
	{
		$q = $this->db->query("SELECT * 
								FROM main_pdo 
									JOIN build_assy ON build_assy.id_pdo= main_pdo.id
								    JOIN assembly ON build_assy.id_assy=assembly.id
								WHERE 
									main_pdo.id_listcarline=$ln AND
								    main_pdo.id_shift=$sf AND
									tanggal>=(now() - INTERVAL 21 DAY) AND
								    assembly.umh=0
								    ");
		if ($q->num_rows()>0) {
			return $q->first_row();
		}else{
			return false;
		}
	}

}

/* End of file verifikasi_model.php */
/* Location: ./application/models/verifikasi_model.php */