<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupervisorModel extends CI_Model {
// supervisor
	public function createSpv($data)
	{
		# code...
		return $this->db->insert('supervisor', $data);
	}

	public function getSpv()
	{
		# code...
		$query = $this->db->get('supervisor');
		return $query->result();
	}
	public function updateSpv($id,$nik,$nama,$passcode)
	{
		# code...
		$data = array(
			'id' => $id,
			'nik' => $nik,
			'nama' => $nama,
			'passcode' => $passcode,
		);
		$this->db->where('id', $id);
		return $this->db->update('supervisor', $data);
	}

	public function delSpv($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('supervisor');
		return $result;
	}


// detail supervisor

	public function newSpvMgr($data)
	{ 
		return $this->db->insert('spv_manager', $data);
	}
	public function getRecordById($id)
	{
		# code...
		$q = $this->db->query('SELECT line.nama_line, spv_manager.id_supervisor as id_sup from spv_manager join list_carline on spv_manager.id_list_carline=list_carline.id join line on list_carline.id_line=line.id where spv_manager.id_supervisor='.$id.' ');
		return $q->result();
	}

	public function create($data)
	{
		# code...
		return $this->db->insert('spv_manager', $data);
	}

	public function getListById($id)
	{
		# code...
		$q = $this->db->query('SELECT *, spv_manager.id as id_man, spv_manager.id_supervisor as id_sup from spv_manager join list_carline on spv_manager.id_list_carline=list_carline.id join line on list_carline.id_line=line.id join carline on list_carline.id_carline=carline.id where spv_manager.id_supervisor='.$id.' ');
		return $q->result();
	}

	public function deleteSpvMan($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('spv_manager');
		return $result;
	}
}

/* End of file supervisorModel.php */
/* Location: ./application/models/supervisorModel.php */