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
		$query = $this->db->query('SELECT carline.id as id_carline, carline.nama_carline, district.id as id_district , district.nama from carline join district on carline.id_district=district.id where status=1 order by carline.nama_carline asc');
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
		$data = array(
			'status' => 0
		);
		$this->db->where('id',$id);
		return $this->db->update('carline', $data);
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
		// urut berdasarkan abjad
		$this->db->order_by('nama_line','asc');
		// get data
		$query = $this->db->get('line');
		return $query->result();
	}

	public function getLineArrWhere($arr)
	{
		foreach ($arr as $key => $value) {
			$this->db->where($value['key'],$value['value']);
		}
		$q = $this->db->get('line');
		return $q->result();
	}

	public function getCarlineByDistric($dis)
	{
		$q = $this->db->query("SELECT * from carline JOIN list_carline ON list_carline.id_carline=carline.id WHERE carline.id_district=$dis GROUP BY list_carline.id_carline ORDER BY carline.nama_carline");
		return $q->result();
	}


	public function getLineByCarlineId($id_cr)
	{
		$q = $this->db->query("SELECT *,list_carline.id as id_lscr FROM list_carline JOIN line on list_carline.id_line=line.id WHERE id_carline=$id_cr");
		return $q->result();
	}


}

/* End of file carlineModel.php */
/* Location: ./application/models/carlineModel.php */