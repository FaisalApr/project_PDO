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
		$q = $this->db->query('SELECT * , COUNT(assembly.kode_assy) as total from line join line_manager on line.id=line_manager.id_line JOIN assembly on line_manager.id_assy=assembly.id  GROUP BY line.nama_line ORDER BY line.nama_line');
		return $q->result();
	}

	public function getRecordById($id)
	{
		# code...
		$q = $this->db->query('SELECT * FROM line_manager join assembly on line_manager.id_assy=assembly.id where line_manager.id_list_carline='.$id);
		return $q->result();
	}

	public function getLineManById($id)
	{
		# code...
		$q = $this->db->query('SELECT *, line_manager.id as id_man from line_manager join assembly on assembly.id=line_manager.id_assy where line_manager.id_line='.$id.' ');
		return $q->result();
	}
}

/* End of file lineManagerModel.php */
/* Location: ./application/models/lineManagerModel.php */