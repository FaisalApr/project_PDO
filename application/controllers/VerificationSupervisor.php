<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationSupervisor extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->model('Verifikasi_model');
		$this->load->model('Pdo_model');
	 
	}

	public function verification()
	{ 
		// Upload gambar
			date_default_timezone_set("Asia/Jakarta");
			$new_name = date("Ymd-His");//new name
			
			$idp = $this->input->post('id_pdo');
			$nik = $this->input->post('nik');

			// Prepairing IMAGE
			$img = $this->input->post('img'); //get the image string from ajax post 
			$img2 = base64_decode($img);  
	        $target= $new_name.'_'.$idp.'_'.$nik.'.png'; //rename the image by time
	        file_put_contents('./assets/src/image-signature/'.$target,$img2); //put the image where your image folder directory is located 
			
			// insert alamat gambar 
	        $dataupd = array(  
	        	'waktu' => date("Y-m-d H:i:s"),
				'status' => 1,
				'signature' => 'image-signature/'.$target
			);
			// proc Update db signature
	     	$result = $this->Pdo_model->updatePdo($dataupd,$idp);
	     	// create History
	  //    	$dataupd = array(  
			// 	'status' => 1,
			// 	'signature' => 'image-signature/'.$target
			// );
	  //    	$result = $this->Pdo_model->createPdoHistory($data); 
		echo json_encode($target);
	} 



	public function cekPassCodeSpv()
	{	 

		$passcode = $this->input->post('passcode');
		$pdo = $this->input->post('pdo');

		$result = $this->Verifikasi_model->cekPasscode($passcode,$pdo); 

		echo json_encode($result);
	}

}

/* End of file uploadSignature.php */
/* Location: ./application/controllers/uploadSignature.php */