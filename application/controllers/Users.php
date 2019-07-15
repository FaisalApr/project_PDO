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
					    	'id_user' => $usr[0]->id,
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

	// mencari list carline by DISTRICT 
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

	
	// mencari list carline  by ID_user
	public function getListLineCarlineByUser()
	{
		$idu = $this->input->post('id_user');
		$carl = $this->Users_model->getUsersCarlineGroup($idu);
		$data = array(); 

		foreach ($carl as $key) {
			// mencari isi setiap carline
			$cline = $this->Users_model->getUsersLineByCarline($idu,$key->id_carline);
			$line = array();
			foreach ($cline as $ckey) {
				// get sesion
				$ses_opt = $this->session->userdata('pdo_opt'); 

				if ($ckey->id_lst==$ses_opt['id_line']) {
					$tmp = array(
							'id' => $ckey->id_lst,  // id_ tbl-list-carline
							'text' => $ckey->nama_line, //nama_line tbl-line
							"selected" => true
						);
				}else{
					$tmp = array(
							'id' => $ckey->id_lst,  // id_ tbl-list-carline
							'text' => $ckey->nama_line //nama_line tbl-line
						);
				}
				array_push($line, $tmp); 
			}

			// insert data ke arr utama
		 	$isi = array(
		 			'text' => $key->nama_carline, // nama_car tbl-carline
		 			'children' => $line
		 			);
		 	array_push($data, $isi); 
		}

		echo json_encode($data);
	}


}

/* End of file users.php */
/* Location: ./application/controllers/users.php */