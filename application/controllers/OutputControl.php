<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputControl extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('OutputControl_model');   
	}

	public function index()
	{

	}
 




// ============== Ajaxx. ===========
	
	public function getDataOutputControl()
	{
		# code...
		$result = $this->OutputControl_model->getOutputControl();

		echo json_encode($result);
	}

	public function getDataBuildAssy()
	{
		# code...
		$id = $this->input->post('id');
		$result = $this->OutputControl_model->getBuildAssy($id);

		echo json_encode($result);
	}

	public function getDataBuildAssyHeader()
	{
		# code...
		$id = $this->input->post('id');
		$result = $this->OutputControl_model->getBuildAssyHead($id);

		echo json_encode($result);
	}

	public function getSelisih()
	{  
		$result = $this->OutputControl_model->getCountBeforeBuild(); 
		echo json_encode($result);
	}


	public function newDataOutputControl()
	{
		# code... 
		$result = $this->OutputControl_model->createOutputControl();

		echo json_encode($result);
	}

	public function newDataBuildAssy()
	{
		# code... 
		$result = $this->OutputControl_model->createBuildAssy();

		echo json_encode($result);
	}

	public function updateDataBuildAssy()
	{
		# code... 
		$result = $this->OutputControl_model->updateBuildAssy();

		echo json_encode($result);
	}


}

/* End of file outputControl.php */
/* Location: ./application/controllers/outputControl.php */