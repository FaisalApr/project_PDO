<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorCode_model extends CI_Model {

// create
	public function createErrorCode($data)
	{
		# code...
		return $this->db->insert('jenis_error',$data);
	}

// read
	public function getEcode()
	{
		# code...
		// Urutkan berdasar abjad
        $this->db->order_by('kode',"asc");

        $query = $this->db->get('jenis_error');
        return $query->result();
	}

//delete 
	public function delEcode($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('jenis_error');
		return $result;
	}
	
	public function updateEcode($id,$code,$ket,$pasi,$resp)
	{
		# code...
		$data = array(
			'kode' => $code,
			'keterangan' => $ket,
			'kodepasi' => $pasi,
			'responsible' => $resp
		);
		$this->db->where('id',$id);
		return $this->db->update('jenis_error',$data);
	}

}

/* End of file errorCode_model.php */
/* Location: ./application/models/errorCode_model.php */