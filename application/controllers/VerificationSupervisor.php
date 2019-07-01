<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationSupervisor extends CI_Controller {

	function __construct(){
		parent::__construct(); 
	}

	public function verification()
	{
		date_default_timezone_set("Asia/Jakarta");
		$new_name = date("Ymd-His");//new name
		
		$img = $this->input->post('img'); //get the image string from ajax post
        $img = substr(explode(";",$img)[1], 7); //this extract the exact image
        $target= $new_name.'_img.png'; //rename the image by time
        $image = file_put_contents('./assets/src/image-signature/'.$target,base64_decode($img)); //put the image where your image folder directory is located 
 
		echo json_encode($target);
	}

}

/* End of file uploadSignature.php */
/* Location: ./application/controllers/uploadSignature.php */