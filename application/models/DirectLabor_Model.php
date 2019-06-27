<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectLabor_Model extends CI_Model {
 
	public function createDL($data)
	{ 
		return $this->db->insert('direct_labor', $data);
	}
 


	public function arrayInsertDirectActivity()
	{
		$new = array(
				'id_pdo' => $this->input->post('idpdo'),
				'item' => $this->input->post('activity'),
				'qty_mp' => $this->input->post('qty'),
				'menit' => $this->input->post('menit'),
				'total' => $this->input->post('total')
			);
		$result = $this->db->insert('indirect_activity',$new);

		return $result;
	}


	public function cariDirectLabor($iddl) 
	{
		$this->db->select('*');
		$this->db->from('direct_labor');
		$this->db->where('id_pdo',$iddl);   
		$query=$this->db->get();

		return $query->first_row();
	}
	


} 