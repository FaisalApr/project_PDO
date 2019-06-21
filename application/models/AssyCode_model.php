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

	public function delAcode($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('assembly');
		return $result;
	}

}

/* End of file assyCode_model.php */
/* Location: ./application/models/assyCode_model.php */