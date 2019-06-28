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


	public function createAbsenPegawai($data)
	{
		# code...
		return $this->db->insert('absen_pegawai', $data);
	}

	public function getAbsenPegawai()
	{
		# code...
		// urut abjad
		$this->db->order_by('item','asc');
		// get data
		$query = $this->db->get('absen_pegawai');
		return $query->result();
	}

	public function delAbsenPegawai($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('absen_pegawai');
		return $result;
	}

	public function updateAbsenPegawai($id,$item,$qty,$jam,$total)
	{
		# code...
		$data = array(
			'item' => $item,
			'qty' => $qty,
			'jam' => $jam,
			'total' => $total
		);
		$this->db->where('id',$id);
		$result = $this->db->update('absen_pegawai', $data);
	}

} 