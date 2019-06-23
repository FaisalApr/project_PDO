<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 	
 	function __construct(){
		parent::__construct();		
		$this->load->model('Pdo_model');  
		$this->load->model('DirectLabor_Model');
		$this->load->model('InDirectLabor_Model');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{ 
		$username = "1sss"; //$this->input->post('username');
		$shift =  "c" ;//$this->input->post('password');
		$tanggal = date("Y-m-d");  

		$result = $this->Pdo_model->cariPdo($username,$shift,$tanggal);
		if ($result) { 
			redirect('Dasboard','refresh');
		}else {  
			$this->load->view('welcome_message');
		}

	}





// ==============. Pos  =================== 
	  
	public function newPdo()
	{
		// init
		$output = array('error' => false,'error1' => false,'error2' => false); 

		// data new PDO
		$dataPdo = array(
			'id_shift' => 1, 
			'id_users' => 1, 
			'cv' => '12A', 
			'tanggal' => date("Y-m-d H:i:s"),
			'line_speed' => 0
		);
		// insert data new pdo
		$result = $this->Pdo_model->createPdo($dataPdo);
		if ($result) {
			$pdo = $this->Pdo_model->cariPdoItems(1,1,date("Y-m-d"));
 			
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
	        // jika In Direct Labor Sukses
        	if ($result2) {
 
        	}else{
        		$output['error2'] = true;	
        	}

 
		}else{
			$output['error'] = true;
		} 

		echo json_encode($output);
	}
 
		// arr atcv
		// $atcv_arr = $this->input->post('arr_actv'); 

}























