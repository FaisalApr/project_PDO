<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineModel extends CI_Model {

	public function createLine($data)
	{
		# code...
		return $this->db->insert('line',$data);
	}

	public function getLine()
	{
		# code...
		$this->db->order_by('nama_line','asc');
		$query = $this->db->get('line');
		return $query->result();
	}

	public function delLine($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('line');
		return $result;
	}

	public function updateLine($id,$id_line,$id_assy)
	{
		# code...
		$data = array(
			'nama_line' => $nama,
		);
		$this->db->where('id',$id);
		return $this->db->updat('line', $data);
	}

}

/* End of file lineModel.php */
/* Location: ./application/models/lineModel.php */