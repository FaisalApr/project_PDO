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
	
	public function FunctionName($value='')
	{
		# code...
	}

}

/* End of file excel_import_model.php */
/* Location: ./application/models/excel_import_model.php */