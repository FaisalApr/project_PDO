<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssyCode_model extends CI_Model {

	public function createAssyCode($data)
	{
		# code...
		return $this->db->insert('assembly',$data);
	}

	public function getAcode()
	{
		# code...
		// urut berdasarkan abjad
		$this->db->order_by('kode_assy','asc');
		// get data
		$query = $this->db->get('assembly');
		return $query->result();
	}

	public function getAcodeDasboard($id_ln)
	{
		# code...
		$q = $this->db->query("SELECT * FROM line_manager JOIN assembly on line_manager.id_assy=assembly.id WHERE id_line=$id_ln");
		return $q->result();
	}

	public function delAcode($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('assembly');
		return $result;
	}

	public function updateACode($id,$kode,$umh)
	{
		# code...
		$data = array(
			'kode_assy' => $kode,
			'umh' => $umh
 		);

 		$this->db->where('id',$id);
 		return $this->db->update('assembly', $data);
	}

}

/* End of file assyCode_model.php */
/* Location: ./application/models/assyCode_model.php */