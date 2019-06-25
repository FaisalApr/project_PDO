<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defect_Model extends CI_Model {

	public function createDefect($data)
	{
		# code...
	return $this->db->insert('quality_control',$data);
	}

	public function get_all_level()
    {
        $query = $this->db->get('jenis_deffect');
        return $query->result();
    }

    public function get_all_record()
    {
    	# code...
    	$query = $this->db->get('output_control');
    	return $query->result();
    }

    public function getDefCode()
    {
    	# code...
    	// urut berdasarkan abjad
		$this->db->order_by('keterangan','asc');
		// get data
		$query = $this->db->get('quality_control');
		return $query->result();
    }

}

/* End of file defectModel.php */
/* Location: ./application/models/defectModel.php */