<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputControl extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('OutputControl_model');   
		$this->load->model('Losstime_model');   
	}
   


   

// ============== Ajaxx. ===========
	
	public function getDataOutputControl()
	{
		# code...
		$result['data'] = $this->OutputControl_model->getOutputControl();
		$result['mhin_tot'] = $this->OutputControl_model->getMHintot();
		$result['mhin'] = $this->OutputControl_model->getMHin();
		$result['mp'] = $this->OutputControl_model->getMP();
		$result['to_lossdetik'] = $this->Losstime_model->getToLosstimeDetik();

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

	public function updatePlanControl()
	{ 
		echo json_encode($this->OutputControl_model->updatePlanOC());
	}	
 
 

}

/* End of file outputControl.php */
/* Location: ./application/controllers/outputControl.php */