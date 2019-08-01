<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_model extends CI_Model {

	public function getSumQcd($id_pdo)
	{
		$query= $this->db->query("SELECT *,sum(actual)as jumlah,(sum(actual)*assembly.umh) as total FROM build_assy JOIN assembly ON build_assy.id_assy=assembly.id WHERE id_pdo='".$id_pdo."'  GROUP BY build_assy.id_assy"); 
        return $query->result(); 
	}

	public function getDataQcd($id)
	{
		$query= $this->db->query("SELECT * 
									FROM main_pdo 
									JOIN list_carline on main_pdo.id_listcarline=list_carline.id
									JOIN carline ON list_carline.id_carline=carline.id
                                    JOIN line ON list_carline.id_line=line.id
									JOIN direct_labor on main_pdo.id=direct_labor.id_pdo
									JOIN shift on main_pdo.id_shift=shift.id
									WHERE main_pdo.id='".$id."'"); 
        return $query->first_row();
	}



}

/* End of file export_model.php */
/* Location: ./application/models/export_model.php */