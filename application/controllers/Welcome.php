<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 	
 	function __construct(){
		parent::__construct();		
		$this->load->model('Pdo_model');  
		$this->load->model('DirectLabor_Model');
		$this->load->model('InDirectLabor_Model');
		date_default_timezone_set("Asia/Jakarta");
		
		// jika tidak memiliki sesi		
		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}
	}

	public function index()
	{ 
		// get sesion
		$session_data = $this->session->userdata('pdo_logged'); 

		// init data
		$id_user = $session_data['id_user'];  
		$shift =  $session_data['id_shift']; 
		$tanggal = date("Y-m-d");  //"2019-06-22";

		// jika user sudah ada data pdo
		$result = $this->Pdo_model->cariPdo($id_user,$shift,$tanggal);
		if ($result) { 
			redirect('Dasboard','refresh');
		}else {  

			$this->load->view('welcome_message');
		}

	}





// ==============. Pos  =================== 
	  
	public function newPdo()
	{
		// get sesion
		$session_data = $this->session->userdata('pdo_logged');
		// init
		$output = array('error' => false,'error1' => false,'error2' => false);  

		// data new PDO
		$dataPdo = array(
			'id_shift' => $session_data['id_shift'], 
			'id_users' => $session_data['id_user'], 
			'id_line' => $session_data['id_line'], 
			'tanggal' => date("Y-m-d H:i:s"),
			'line_speed' => $this->input->post('speed'),
			'jam_kerja' => (8+$this->input->post('jam_otdl')),
			'status' => 0 
		);
		// insert data new pdo
		$result = $this->Pdo_model->createPdo($dataPdo);
		if ($result) {
			// mencari pdo yang sudah di insert
			$pdo = $this->Pdo_model->cariPdoItems($session_data['id_user'],$session_data['id_shift'],date("Y-m-d"));
 			
 			// hitungan
 			$mhreg = ($this->input->post('regdl')*8);
 			$mhot = ($this->input->post('jam_otdl')*$this->input->post('dl_otdl'));
 			$total =  $mhreg+$mhot ; 

 			// directlabor
			$dataDl = array(
	            'id_pdo'	       => $pdo->id,
	            'jam_reg'	       => 8,
	            'std_dl'     => $this->input->post('stddl'),
	            'reg_dl'   	   => $this->input->post('regdl'),
	            'jam_ot'     => $this->input->post('jam_otdl'),
	            'dl_ot'    => $this->input->post('dl_otdl'),
	            'mh_reg'    => $mhreg ,
	            'mh_ot'    => $mhot,
	            'total'    => $total
	        ); 
	        
	        // hitungan
 			$mhreg = ($this->input->post('regidl')*8);
 			$mhot = ($this->input->post('jam_otidl')*$this->input->post('dl_otidl'));
 			$total =  $mhreg+$mhot ; 
	        // IndirectLabor 
	        $dataIdl = array(
	            'id_pdo'	       => $pdo->id,
	            'jam_reg'	       => 8,
	            'std_idl'     => $this->input->post('stdidl'),
	            'reg_idl'   	   => $this->input->post('regidl'),
	            'jam_ot'     => $this->input->post('jam_otidl'),
	            'dl_ot'    => $this->input->post('dl_otidl'),
	            'mh_reg'    => $mhreg ,
	            'mh_ot'    => $mhot,
	            'total'    => $total
	        );

	        // insert ke dDB
	        $result1 = $this->DirectLabor_Model->createDL($dataDl);
	        $result2 = $this->InDirectLabor_Model->createIDL($dataIdl);
	        
	        // jika direct labor sukses
	        if ($result1) {  
	        }else{
	        	$output['error1'] = true;
	        }
	        // jika In-Direct Labor Sukses
        	if ($result2) { 
        	}else{
        		$output['error2'] = true;	
        	}

 			$output['id_pdo'] = $pdo->id; 
		}else{
			$output['error'] = true;
		} 

		echo json_encode($output);
	}
 
		// arr atcv
		// $atcv_arr = $this->input->post('arr_actv'); 

}























