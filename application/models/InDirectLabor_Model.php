<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InDirectLabor_Model extends CI_Model {
 
	public function createIDL($data)
	{ 
		return $this->db->insert('indirect_labor', $data);
	}

	public function createAbsenLeader($data)
	 {
	 	# code...
	 	return $this->db->insert('absen_leader',$data);
	 } 

	public function getAbsenLeader()
	{
		# code...
		$id_pdo = $this->input->post('id_pdo');
		// urut abjad
		$this->db->order_by('item','asc');
		// get data
		$query = $this->db->get_where('absen_leader', array('id_pdo' => $id_pdo));
		return $query->result();
	}	 

	public function delAbsenLeader($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('absen_leader');
		return $result;
	}
	public function updateAbsenLeader($id,$item,$qty,$jam,$total)
	{
		# code...
		$data = array(
			'item' => $item,
			'qty' => $qty,
			'jam' => $jam,
			'total' => $total
		);
		$this->db->where('id',$id);
		$result = $this->db->update('absen_leader', $data);
	}

} 