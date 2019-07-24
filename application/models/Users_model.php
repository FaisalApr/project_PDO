<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {


	public function newUser($data)
	{ 
		return $this->db->insert('users', $data);
	}

	public function newUserHasLine($data)
	{ 
		return $this->db->insert('user_has_line', $data);
	}

	public function delAllUserHasLine($id)
	{
		$this->db->where('id_user', $id ); 
		return $this->db->delete('user_has_line');
	}

	 public function updateUserrr($new,$id)
	{ 
		$this->db->where('id', $id);
		return $this->db->update('users', $new);
	}

	public function deleteUserrr()
	{
		$data = array('active' => 0);

		$this->db->where('id', $this->input->post('idu') ); 
		return $this->db->update('users',$data);
	}

	public function getAllUser()
	{
		$query = $this->db->query("SELECT 
										users.id,users.nik,users.username,users.nama,users.password,users.level,shift.id as id_sf,shift.keterangan,district.id as id_dis,district.nama as dis,users.active,level.jabatan
									FROM users 
									JOIN district on users.id_district=district.id 
									JOIN shift on users.id_shift=shift.id
									JOIN level on users.level=level.id

									where users.level!=1 AND users.active=1
								");
        return $query->result();
	}

	public function getUsername($uname)
	{
		$query = $this->db->get_where('users',array('username'=>$uname));
        return $query->result();
	}

	public function getAllLine()
	{
		$query = $this->db->get('line');
        return $query->result();
	}

	public function getAllUserA()
	{
		$query = $this->db->get_where('users',array('id_shift'=>1));
        return $query->result();
	}

	public function getAllUserB()
	{
		$query = $this->db->get_where('users',array('id_shift' =>2));
        return $query->result();
	}
 
	public function getUserJobLine($idu)
	{
		$q = $this->db->query("SELECT * 
									FROM user_has_line 
									JOIN list_carline on user_has_line.id_listcarline=list_carline.id
									JOIN carline on list_carline.id_carline=carline.id
                                    JOIN line ON list_carline.id_line=line.id
									WHERE id_user='$idu'
									-- GROUP BY list_carline.id_carline 
									ORDER BY carline.nama_carline ASC");
		return $q->result();
	}
	public function getUsersCarlineGroup($idu)
	{
		$que = $this->db->query("SELECT * 
									FROM user_has_line 
									JOIN list_carline on user_has_line.id_listcarline=list_carline.id
									JOIN carline on list_carline.id_carline=carline.id
									WHERE id_user='$idu'
									GROUP BY list_carline.id_carline ORDER BY carline.nama_carline ASC ");
		return $que->result();
	}

	public function getUsersLineByCarline($idu,$crl)
	{
		$que = $this->db->query("SELECT *,list_carline.id as id_lst
									FROM user_has_line 
									JOIN list_carline on user_has_line.id_listcarline=list_carline.id
									JOIN line on list_carline.id_line=line.id
									WHERE id_user=$idu AND list_carline.id_carline=$crl");
		return $que->result();
	}

	// login admin carline dist
	public function cariCarlineByDistric($dist)
	{
		$q = $this->db->query("SELECT * FROM carline WHERE id_district=$dist");

		if ($q->num_rows()>0) {
			return $q->first_row();
		}else{
			return false;
		} 
	}

	public function getAdminLineAutoPicker($crl)
	{
		$q = $this->db->query("SELECT *,list_carline.id as id_lst 
									from list_carline 
									JOIN line on list_carline.id_line=line.id
									WHERE list_carline.id_carline=$crl");
		if ($q->num_rows()>0) {
			return $q->first_row();
		}else{
			return false;
		} 
	}

	// admin carline
	public function getAdminCarlineGroup($dist)
	{
		// $que = $this->db->query("SELECT * 
		// 							FROM user_has_line 
		// 							JOIN list_carline on user_has_line.id_listcarline=list_carline.id
		// 							JOIN carline on list_carline.id_carline=carline.id
		// 							WHERE carline.id_district='$dist'
		// 							GROUP BY list_carline.id_carline ORDER BY carline.nama_carline ASC ");
		$que = $this->db->query("SELECT *  
								FROM list_carline
								JOIN carline on list_carline.id_carline=carline.id

								WHERE carline.id_district=1
								GROUP BY list_carline.id_carline 
								ORDER BY carline.nama_carline ASC");
		return $que->result();
	}

	// dropdown admin
	public function getAdminCarlineDropdown($dist)
	{
		$que = $this->db->query("SELECT *,list_carline.id as id_lst
								from list_carline 
								    JOIN line on list_carline.id_line=line.id
								WHERE list_carline.id_carline=$dist");
		return $que->result();
	}


}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */