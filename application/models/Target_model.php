<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_model extends CI_Model {

	

	public function getDataMonth($dat,$ln)
	{ 
		$query= $this->db->query("SELECT * FROM target 
									WHERE 
										YEAR(periode)=YEAR('$dat') AND 
									    MONTH(periode)=MONTH('$dat') AND 
									    id_list_carline='$ln' 
									order by periode DESC");
        
        if ($query->num_rows()>=1) {
			return $query->first_row(); 
		}else{
			return false;
		}
	}

	public function newTarget($data)
	{
		return $this->db->insert('target',$data);
	}

	public function edittarget($data)
	{
		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('target',$data);
	} 


}

/* End of file target_model.php */
/* Location: ./application/models/target_model.php */