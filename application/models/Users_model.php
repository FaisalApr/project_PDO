<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {


	public function newUser($data)
	{ 
		return $this->db->insert('users', $data);
	}

	 public function updateUserrr()
	{ 
		$new = array(
					'username' => $this->input->post('uname'),
					'password' => $this->input->post('pass'),  
					'id_shift' => $this->input->post('sif'),
					'id_line' => $this->input->post('ln')
				);	
		$this->db->where('id', $this->input->post('idu') );
		return $this->db->update('users', $new);
	}

	public function deleteUserrr()
	{
		$this->db->where('id', $this->input->post('idu') );
		$result = $this->db->delete('users');
		return $result;
	}

	public function getAllUser()
	{
		$query = $this->db->query('SELECT users.id,users.username,users.password,users.level,users.active,users.id_shift,users.id_line,shift.keterangan,line.nama_line FROM users JOIN shift ON users.id_shift=shift.id JOIN line on users.id_line=line.id');
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
	

}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */