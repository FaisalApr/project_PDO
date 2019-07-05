<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationSupervisor extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->model('Verifikasi_model');
		$this->load->model('Pdo_model');

		if (!$this->session->userdata('pdo_logged')) {
			redirect('Login','refresh');
		}		 
	}

	public function verification()
	{ 
		// Upload gambar
			date_default_timezone_set("Asia/Jakarta");
			$new_name = date("Ymd-His");//new name
			
			$img = $this->input->post('img'); //get the image string from ajax post
	        $img = substr(explode(";",$img)[1], 7); //this extract the exact image
	        $target= $new_name.'_img.png'; //rename the image by time
	        $image = file_put_contents('./assets/src/image-signature/'.$target,base64_decode($img)); //put the image where your image folder directory is located  
		// insert alamat gambar
	        $idp = $this->input->post('id_pdo');
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
		// mengambil data sesion
		$ses_data = $this->session->userdata('pdo_logged'); 

		$passcode = $this->input->post('passcode');
		$line = $ses_data['id_line'] ; 

		$result = $this->Verifikasi_model->cekPasscode($passcode,$line); 

		echo json_encode($result);
	}

}

/* End of file uploadSignature.php */
/* Location: ./application/controllers/uploadSignature.php */