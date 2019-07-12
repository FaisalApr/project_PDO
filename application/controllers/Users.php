<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Users_model');   
		$this->load->model('CarlineModel');
		// jika tidak memiliki sesi		
		// if (!$this->session->userdata('pdo_logged')) {
		// 	redirect('Login','refresh');
		// }		 
	}

	public function index()
	{
		// $data['line'] = $this->Users_model->getAllLine();
		$this->load->view('users/home_user');	
	}




	//  ======= AJAX. ========
	public function addUser()
	{ 
		// new user data
		$us = array(
					'nama' => ($this->input->post('nama')),
					'nik' => ($this->input->post('nik')), 
					'username' => $this->input->post('uname'),
					'password' => $this->input->post('pass'),
					'id_district' => $this->input->post('dist'),
					'level' => $this->input->post('level'),
					'id_shift' => $this->input->post('shift'),
					'active' => 1
				);	 

		$data = $this->Users_model->newUser($us);
		
		if ($data) {
			$usr = $this->Users_model->getUsername($this->input->post('uname'));

			$arrline = $this->input->post('linemgr');
			 
			if (is_array($arrline)) {
				$as = array();
				foreach($arrline as $vl) { 
				    $ne = array(
					    	'id_user' => $usr->id,
					    	'id_listcarline' => $vl
					    );
				    array_push($as, $ne);

				    $this->Users_model->newUserHasLine($ne);
				} 	
			}else{
				echo json_encode('NOOOO');
			}
			
		}
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
		// $result['aa'] = $this->Users_model->getAllUserA();
		// $result['bb'] = $this->Users_model->getAllUserB();

		echo json_encode($result);
	}

	public function searchUsername()
	{
		$data = $this->Users_model->getUsername($this->input->post('uname'));	
		echo json_encode($data);
	}

	public function getListByDistrict()
	{
		$dist = $this->input->post('dist');
		$quer = $this->CarlineModel->getCarlineByDistric($dist);	
		
		$data = array();
		foreach ($quer as $key) {
			$tmp = array();
			$qu = $this->CarlineModel->getLineByCarlineId($key->id_carline);	

			foreach ($qu as $k) {
				$d = array(
						'id' => $k->id_lscr,
						'text' => $k->nama_line
					);
				array_push($tmp, $d);
			}

			$da = array(
						'text' => $key->nama_carline,
						'children' => $tmp
					);

			array_push($data, $da);
		}

		
		echo json_encode($data);
	}


}

/* End of file users.php */
/* Location: ./application/controllers/users.php */