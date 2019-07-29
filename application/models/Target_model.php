<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_model extends CI_Model {

	

	public function getDataMonth($dat,$ln)
	{ 
		$query= $this->db->query("SELECT * FROM target 
									WHERE 
										YEAR(periode)=YEAR('$dat') AND 
										MONTH(periode)=MONTH('$dat') AND  
									    DAY(periode)=DAY('$dat') AND
										id_list_carline='$ln' 
									order by periode ASC");
        
        if ($query->num_rows()>=1) {
			return $query->first_row();  
		}else{
			return false;
		}
	}

	public function getDataProdBalance($dat,$ln)
	{
		$query= $this->db->query("SELECT * 
									FROM balance_produksi 
									WHERE 
										YEAR(tanggal)=YEAR('$dat') AND
									    MONTH(tanggal)=MONTH('$dat') AND
									    id_listcarline=$ln
									    ");
        
        if ($query->num_rows()>=1) {
			return $query->first_row();  
		}else{
			return false;
		}
	}

	public function getResultDataMonth($dat,$ln)
	{ 
		$query= $this->db->query("SELECT * FROM target 
									WHERE 
										YEAR(periode)=YEAR('$dat') AND 
										MONTH(periode)=MONTH('$dat') AND 
										id_list_carline='$ln' 
									order by periode ASC");
        
        if ($query->num_rows()>=1) {
			return $query->result();  
		}else{
			return false;
		}
	}

	public function getTargetResultNow($dat,$ln)
	{ 
		$query= $this->db->query("SELECT * FROM target 
									WHERE 
										periode='$dat' AND  
										id_list_carline='$ln' 
									order by periode ASC");
        
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

	public function edittarget2($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('target',$data);
	}

	public function edittarget3($data,$start,$end)
	{ 
		$this->db->where('periode>=',$start);
		$this->db->where('periode<=',$end);
		return $this->db->update('target',$data);
	} 

	public function editBalanceProduksi($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('balance_produksi',$data);
	}

	public function newBalanceProduksi($data)
	{ 
		return $this->db->insert('balance_produksi',$data);
	}

	public function cariDataTarget($dat,$ln)
	{
		$query= $this->db->query("SELECT * FROM target 
									WHERE 
										YEAR(periode)=YEAR('$dat') AND 
										MONTH(periode)=MONTH('$dat') AND  
									    DAY(periode)=DAY('$dat') AND
										id_list_carline='$ln'
								");
        
        if ($query->num_rows()>=1) {
			return $query->first_row();  
		}else{
			return false;
		}
	}


}

/* End of file target_model.php */
/* Location: ./application/models/target_model.php */