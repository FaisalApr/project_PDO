<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarlineModel extends CI_Model {

// carline 
	public function createCarline($data)
	{
		# code...
		return $this->db->insert('carline', $data);
	}

	public function get_all_level()
	{
		# code...
		$query = $this->db->get('district');
		return $query->result();
	}
	public function get_all_level_2()
	{
		# code...
		$query = $this->db->get('line');
		return $query->result();
	}

	public function getCarline()
	{
		# code...
		$query = $this->db->query('SELECT carline.id as id_carline, carline.nama_carline, district.id as id_district , district.nama from carline join district on carline.id_district=district.id');
		return $query->result();
	}

	public function updateCarline($id,$nama_carline,$id_district)
	{
		# code...
		$data = array(
			'id_district' => $id_district,
			'nama_carline' => $nama_carline
		);
		$this->db->where('id',$id);
		return $this->db->update('carline', $data);
	}

	public function delCarline($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('carline');
		return $result;
	}
	
// detail carline
	
	public function create($data)
	{
		# code...
		return $this->db->insert('list_carline', $data);
	}

	public function getRecordById($id)
	{
		# code...
		$q = $this->db->query('SELECT * from list_carline join line on list_carline.id_line=line.id where list_carline.id_carline='.$id.' ');
		return $q->result();
	}

	public function getListById($id)
	{
		# code...
		$q = $this->db->query('SELECT *, list_carline.id as id_list from list_carline join line on list_carline.id_line=line.id where list_carline.id_carline='.$id.' ');
		return $q->result();
	}	
	public function delete($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('list_carline');
		return $result;
	}
	public function getLine()
	{
		# code...
		// urut berdasarkan abjad
		$this->db->order_by('nama_line','asc');
		// get data
		$query = $this->db->get('line');
		return $query->result();
	}

}

/* End of file carlineModel.php */
/* Location: ./application/models/carlineModel.php */