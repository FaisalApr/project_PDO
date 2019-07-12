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
		$query = $this->db->query('SELECT * FROM users  ');
        return $query->result();
	}

	public function getUsername($uname)
	{
		$query = $this->db->get_where('users',array('username'=>$uname));
        return $query->first_row();
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