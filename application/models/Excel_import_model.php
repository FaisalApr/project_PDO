<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import_model extends CI_Model {

	public function select()
	{
		# code...
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('assembly');
		return $query;
	}
	public function insert($data)
	{
		# code...
		$this->db->insert_batch('assembly', $data);

	}
	

	public function ceknama($kode)
	{

		# code...
		$query = $this->db->query('SELECT * FROM assembly where kode_assy="'.$kode.'"');
		if($query->num_rows()>0){
			return $query->first_row();
		}else{
			return false;
		}
	}

	public function cekline($nama)
	{
		# code...
		$query = $this->db->query('"'.$nama.'"');
		return $query->first_row();
	}

}

/* End of file excel_import_model.php */
/* Location: ./application/models/excel_import_model.php */