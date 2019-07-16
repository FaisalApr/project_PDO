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
        $query = $this->db->query("SELECT * from jenis_error order by keterangan asc");
        return $query->result();
    }

    public function get_all_record_by_id($id)
    {
    	# code...
    	$query = $this->db->get_where('output_control', array('id_pdo' => $id));
    	return $query->result();
    }

    public function findLossTimeByOc($id)
    {
        $quer = $this->db->query("SELECT * from lost_time WHERE id_oc=$id");
        return $quer->result();  
    }

    public function getLosstimeUserrrr($id)
    {
    	# code...
    	$q = $this->db->query("SELECT 
                                    lost_time.id, output_control.jam_ke, jenis_error.kode, jenis_error.keterangan as problem, jenis_losttime.keterangan as jenis, lost_time.keterangan, lost_time.durasi ,
                                    lost_time.id_error as id_err,jenis_losttime.id  as id_jenlos, output_control.id  as id_oc
                                from lost_time 
                                    join jenis_error on lost_time.id_error=jenis_error.id 
                                    join output_control on lost_time.id_oc=output_control.id 
                                    join jenis_losttime on lost_time.id_jenisloss=jenis_losttime.id 

                                where lost_time.id_pdo='".$id."' order by output_control.jam_ke");
    	return $q->result();
    }

    public function getLosstimeWidget($id)
    {
        # code...
        $quer = $this->db->query("SELECT (SELECT COALESCE(SUM(durasi),0) FROM lost_time WHERE id_jenisloss=1 AND id_pdo='".$id."')as to_loss,(SELECT COALESCE(SUM(durasi),0) FROM lost_time WHERE id_jenisloss=2 AND id_pdo='".$id."')as to_exc, (SELECT (SELECT jam_kerja FROM main_pdo WHERE id='".$id."')-(select (select COALESCE(SUM(menit),0) FROM indirect_activity WHERE id_pdo='".$id."')/60)) as jam_iff,(SELECT (SELECT (SELECT (SELECT COALESCE(SUM(durasi),0) FROM lost_time WHERE id_jenisloss=1 AND id_pdo='".$id."')/60)/(SELECT (SELECT jam_kerja FROM main_pdo WHERE id='".$id."')-(select (select COALESCE(SUM(menit),0) FROM indirect_activity WHERE id_pdo='".$id."')/60)))*100)as losspercent");
        $wid = $quer->first_row();  
        return $wid;
    }

    public function getToLosstimeDetik($id)
    { 
        $quer = $this->db->query('SELECT (SELECT COALESCE(SUM(durasi),0) FROM `lost_time` WHERE id_pdo='.$id.')*60 as tot_loss_detik');
        $los = $quer->first_row();  
        return $los;
    }

    public function delLosstime($id)
    {
    	# code...
    	$this->db->where('id',$id);
    	$result = $this->db->delete('lost_time');
    	return $result;
    }

    public function updateLosstime($id,$id_error,$id_oc,$id_jenisloss,$keterangan,$durasi)
    {
    	# code...
    	$data = array(
    		'id_error' => $id_error,
    		'id_oc' => $id_oc,
    		'id_jenisloss' => $id_jenisloss,
    		'keterangan' => $keterangan,
    		'durasi' => $durasi
    	);
    	$this->db->where('id',$id);
    	return $this->db->update('lost_time', $data);
    	
    }

}

/* End of file losstime_model.php */
/* Location: ./application/models/losstime_model.php */