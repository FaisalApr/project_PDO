<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineManagerModel extends CI_Model {

	public function create($data)
	{
		# code...
		return $this->db->insert('line_manager',$data);
	}
	public function update($id,$id_line,$id_kodeassy)
	{
		# code...
		$data = array(
			'id_line' => $id_line,
			'id_assy' => $id_kodeassy
		);
		$this->db->where('id',$id);
		return $this->db->update('line_manager', $data);
	}
	public function delete($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('line_manager');
		return $result;
	}
	public function getLine()
	{
		# code...
		$query = $this->db->get('line');
		return $query->result();
	}

	public function getAssy()
	{
		# code...
		$query = $this->db->get('assembly');
		return $query->result();
	}

	public function getRecord()
	{
		# code...
		$q = $this->db->query('SELECT line_manager.id, line.nama_line, assembly.kode_assy from line_manager join line on line_manager.id_line=line.id JOIN assembly on line_manager.id_assy=assembly.id ORDER BY line.nama_line');
		return $q->result();
	}

}

/* End of file lineManagerModel.php */
/* Location: ./application/models/lineManagerModel.php */