<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScanAssy extends CI_Model {

	public function getIdBuild($kode,$id_pdo,$id_oc)
	{
		# code...
		$q = $this->db->query(' SELECT *,build_assy.id as id_build 
			FROM build_assy 
			JOIN assembly ON build_assy.id_assy=assembly.id 
			WHERE assembly.kode_assy="'.$kode.'" AND build_assy.id_pdo='.$id_pdo.' AND build_assy.id_outputcontrol='.$id_oc.' ');
		if($q->num_rows()>0){
			return $q->first_row();
		}else{
			return false;
		}
		


	}

}

/* End of file scanAssy.php */
/* Location: ./application/models/scanAssy.php */