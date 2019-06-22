<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdo_model extends CI_Model {


	public function cariPdo($id_user,$shift,$tanggal)
	{  

        $this->db->select('*');
        $this->db->from('main_pdo');
        $this->db->where('id_users',$id_user);
        $this->db->where('id_shift',$shift); 
        $this->db->where('DATE(tanggal)', $tanggal ); 
        $query=$this->db->get();

        if ($query->num_rows()>=1) {
			return true;
		}else{
			return false;
		}
	} 

	public function cariPdoItems($id_user,$shift,$tanggal)
	{  

        $this->db->select('*');
        $this->db->from('main_pdo');
        $this->db->where('id_users',$id_user);
        $this->db->where('id_shift',$shift); 
        $this->db->where('DATE(tanggal)', $tanggal );
        $this->db->order_by('tanggal',"desc");
        $query=$this->db->get();

        return $query->first_row();
	} 


	public function createPdo($data)
	{ 
		return $this->db->insert('main_pdo', $data);
	}
 

} 