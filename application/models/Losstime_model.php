<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Losstime_model extends CI_Model {

	public function createLosstime($data)
	{
		# code...
		return $this->db->insert('lost_time',$data); 	
	}

	public function get_all_level()
    {
        $query = $this->db->get('jenis_losttime');
        return $query->result();
    }
    public function get_all_errRecord()
    {
        $query = $this->db->get('jenis_error');
        return $query->result();
    }

    public function get_all_record_by_id($id)
    {
    	# code...
    	$query = $this->db->get_where('output_control', array('id_pdo' => $id));
    	return $query->result();
    }

    public function getLosstimeUserrrr($id)
    {
    	# code...
    	$q = $this->db->query('SELECT lost_time.id, output_control.jam_ke, jenis_error.kode, jenis_error.keterangan as problem, jenis_losttime.keterangan as jenis, lost_time.keterangan, lost_time.durasi from lost_time join jenis_error on lost_time.id_error=jenis_error.id join output_control on lost_time.id_oc=output_control.id join jenis_losttime on lost_time.id_jenisloss=jenis_losttime.id where lost_time.id_pdo='.$id.' order by output_control.jam_ke');
    	return $q->result();
    }

    public function delLosstime($id)
    {
    	# code...
    	$this->db->where('id',$id);
    	$result = $this->db->delete('lost_time');
    	return $result;
    }

}

/* End of file losstime_model.php */
/* Location: ./application/models/losstime_model.php */