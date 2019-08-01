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
		$query = $this->db->query("SELECT 
										district.id as id_dis,district.nama,carline.id as id_carline,carline.nama_carline,list_carline.id as id_liscarline,line.nama_line
									FROM district
									  JOIN carline on carline.id_district=district.id
									  JOIN list_carline on carline.id=list_carline.id_carline
									  JOIN line on list_carline.id_line=line.id 
									ORDER BY carline.nama_carline ASC
								");
		return $query->result();
	}

	public function delLine($id)
	{ 
		
		$this->db->where('id',$id);
		$result = $this->db->delete('line');
		return $result;
	}

	public function updateLine($id,$nama)
	{
		# code...
		$data = array(
			'nama_line' => $nama,
		);
		$this->db->where('id',$id);
		return $this->db->update('line', $data);
	}

	public function getBasicLine()
	{
		$q = $this->db->query("SELECT * FROM line ORDER BY nama_line ASC");
		return $q->result();
	}

}

/* End of file lineModel.php */
/* Location: ./application/models/lineModel.php */