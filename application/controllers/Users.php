<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Users_model');   
		// jika tidak memiliki sesi		
		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}		 
	}

	public function index()
	{
		$data['line'] = $this->Users_model->getAllLine();
		$this->load->view('users/home_user',$data);	
	}




	//  ======= AJAX. ========
	public function addUser()
	{
		// new user data
		$new = array(
					'username' => $this->input->post('uname'),
					'password' => $this->input->post('pass'), 
					'level' => 2,
					'id_shift' => $this->input->post('sif'),
					'id_line' => $this->input->post('ln'),
					'active' => 1
				);	 

		$data = $this->Users_model->newUser($new);
		echo json_encode($data);
	}

	public function updateUser()
	{ 
		$data = $this->Users_model->updateUserrr();
		echo json_encode($data);
	}

	public function deleteUser()
	{
		$data = $this->Users_model->deleteUserrr();
		echo json_encode($data);
	}

	public function showUser()
	{
		$result['all'] = $this->Users_model->getAllUser();
		$result['aa'] = $this->Users_model->getAllUserA();
		$result['bb'] = $this->Users_model->getAllUserB();

		echo json_encode($result);
	}

	public function searchUsername()
	{
		$data = $this->Users_model->getUsername($this->input->post('uname'));	
		echo json_encode($data);
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */