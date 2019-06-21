<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DefectCode_model extends CI_Model {

	// function create
	public function createDefectCode($data)
	{
		# code...
		return $this->db->insert('jenis_deffect',$data);
	}

	// function read
	public function getDcode()
	{
		# code...
		// Urutkan berdasar abjad
        $this->db->order_by('code',"asc");

        $query = $this->db->get('jenis_deffect');
        return $query->result();
	}

	// function delete
	public function delDcode($id)
	{
		# code...
		$this->db->where('id', $id);
        $result = $this->db->delete('jenis_deffect');
        return $result;
	}




}

/* End of file defect_model.php */
/* Location: ./application/models/defect_model.php */