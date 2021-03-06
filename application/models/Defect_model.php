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

    public function get_all_record_by_id($id)
    {
    	# code...
    	$query = $this->db->get_where('output_control', array('id_pdo' => $id));
    	return $query->result();

    }

    public function getDefCodeUser($i)	
    {
    	# code...
    	// urut berdasarkan abjad
		$q = $this->db->query("SELECT 
                                    quality_control.id , quality_control.keterangan as item, output_control.jam_ke,jenis_deffect.keterangan, quality_control.total,jenis_deffect.id  as id_defect ,output_control.id as id_oc
                                FROM quality_control 
                                join output_control on quality_control.id_oc = output_control.id 
                                join jenis_deffect on quality_control.id_jenisdeffect = jenis_deffect.id 
                                where quality_control.id_pdo=$i order BY output_control.jam_ke");
		return $q->result();
    }

    public function getDPM($id)
    {
        $q = $this->db->query('SELECT ((SELECT COALESCE(SUM(total),0) FROM quality_control WHERE id_pdo='.$id.')/(SELECT COALESCE(SUM(actual),0) FROM output_control WHERE id_pdo='.$id.'))*1000000 as dpm');
        // return $q->result();
        return $q->first_row(); 
    }

    public function getTotal($id)
    {
        $q = $this->db->query('SELECT COALESCE(SUM(total),0)as total FROM quality_control WHERE id_pdo='.$id);
        // return $q->result();
        return $q->first_row(); 
    }


    public function delDefects($id)
    {
    	# code...
    	$this->db->where('id',$id);
    	$result = $this->db->delete('quality_control');
    	return $result;
    }

    public function updateDefect($id,$id_oc,$id_jenisdeffect,$keterangan,$total)
    {
        # code...
        $data = array(
            'id_oc' => $id_oc,
            'id_jenisdeffect' => $id_jenisdeffect,
            'keterangan' => $keterangan,
            'total' => $total
        );
        $this->db->where('id',$id);
        return $this->db->update('quality_control', $data);
    }

}

/* End of file defectModel.php */
/* Location: ./application/models/defectModel.php */