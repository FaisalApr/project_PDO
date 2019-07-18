<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 	
 	function __construct(){
		parent::__construct();		
		$this->load->model('Pdo_model');  
		$this->load->model('Verifikasi_model');  
		$this->load->model('DirectLabor_Model');
		$this->load->model('InDirectLabor_Model');
		date_default_timezone_set("Asia/Jakarta");
		
		// jika tidak memiliki sesi		
		// if (!$this->session->userdata('pdo_logged')) {
		// 	redirect('Login','refresh');
		// }
	}

	public function index()
	{ 
		// get sesion
		// $session_data = $this->session->userdata('pdo_logged'); 

		// // init data
		// $id_user = $session_data['id_user'];  
		// $shift =  $session_data['id_shift']; 
		// $tanggal = date("Y-m-d");  //"2019-06-22";

		// // jika user sudah ada data pdo
		// $result = $this->Pdo_model->cariPdo($id_user,$shift,$tanggal);
		// if ($result) { 
		// 	redirect('Dasboard','refresh');
		// }else {  

		// 	$this->load->view('welcome_message');
		// }
		redirect('Dasboard','refresh');
	}

	public function tes()
	{
		$this->load->view('tes');
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
			'id_shift' => $this->input->post('id_shift'), 
			'id_users' => $session_data['id_user'], 
			'id_listcarline' => $this->input->post('id_line'),
			'tanggal' => $this->input->post('id_tgl'),
			'line_speed' => $this->input->post('speed'),
			'jam_kerja' => (8+$this->input->post('jam_otdl')),
			'direct_eff' => 0 ,
			'status' => 0 
		);
		// insert data new pdo
		$result = $this->Pdo_model->createPdo($dataPdo);
		if ($result) {
			// mencari pdo yang sudah di insert
			$pdo = $this->Pdo_model->cariPdoItems($this->input->post('id_line'),$this->input->post('id_shift'),$this->input->post('id_tgl'));
 			
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
	        
	        // PERULANGAN INSERT ACTIV
	        $actv = $this->input->post('act');
	        $tmp = array();

	        if (is_array($actv)) {
	        	foreach ($actv as $key) {
	        		// 
	        		$reg = $this->input->post('regdl');
	        		$dur_jam = ($key['menit']/60);
	        		$to = $reg*$dur_jam;
	        		
	        		$new = array(
							'id_pdo' => $pdo->id,
							'item' => $key['item'],
							'qty_mp' => $reg,
							'menit' => $key['menit'],
							'total' => $to
						);
	        		array_push($tmp, $new);
	        		// insert db
	        		$this->DirectLabor_Model->arrayInsertDirectActivity($new);
	        	}
	        }  

	        //jika direct labor sukses
	        if (!$result1) {  
	        	$output['error|DL'] = true;
	        } 
	        // jika In-Direct Labor Sukses
        	if (!$result2) { 
        		$output['error|IDL'] = true;	
        	} 

 			$output['id_pdo'] = $pdo->id; 
 			$output['tmp'] = $tmp;//$tmp;
		}else{
			$output['error'] = true;
		} 

		echo json_encode($output);
	}
 	
 	public function cekHariIni()
 	{
 		$line = $this->input->post('id_line');
 		$shift = $this->input->post('id_shift');
 		$tanggal = $this->input->post('id_tgl');

 		$result = $this->Pdo_model->cariHariIni($line,$shift,$tanggal);

 		echo json_encode($result);
 	}
 	public function cekBelumVerifikasi()
 	{  	
 		$date = $this->input->post('id_tgl');
 		$line = $this->input->post('id_line');
 		$shift = $this->input->post('id_shift');

 		$result = $this->Verifikasi_model->cariNotVerif($date,$line,$shift);

 		echo json_encode($result);
 		# code...
 	}
		// arr atcv
		// $atcv_arr = $this->input->post('arr_actv'); 

}























