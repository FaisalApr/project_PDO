<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputControl extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Pdo_model');
		$this->load->model('OutputControl_model');
		$this->load->model('DirectLabor_Model');
		$this->load->model('Losstime_model');
		$this->load->model('Defect_model');   
	}
   


   

// ============== Ajaxx. ===========
	
	// func di DASBOARD HOME
	public function getDataOutputControl()
	{
		# code...
		$result['data'] = $this->OutputControl_model->getOutputControl();
		$result['mhin_tot'] = $this->OutputControl_model->getMHintot();
		$result['mhin'] = $this->OutputControl_model->getMHin();
		$result['mp'] = $this->OutputControl_model->getMP();
		$result['to_lossdetik'] = $this->Losstime_model->getToLosstimeDetik();
		$result['data_dl'] = $this->DirectLabor_Model->getDl();
		$result['pdo'] = $this->Pdo_model->pdoById($this->input->post('id_pdo')); 
		
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
		$refresh = $this->Pdo_model->refreshData($this->input->post('id_pdo'));
		
		echo json_encode($result);
	}

	public function updatePlanControl()
	{ 
		echo json_encode($this->OutputControl_model->updatePlanOC());
	}	
 
 	public function hapusBuildAssy()
 	{
 		$pdo = $this->input->post('id_pdo');
 		$id = $this->input->post('id');

 		echo json_encode($this->OutputControl_model->hapus_buildAssyAll($id,$pdo));
 	}

 	public function updateColBuildAssy()
 	{  
 		echo json_encode($this->OutputControl_model->updateAssyAll());
 	}

}

/* End of file outputControl.php */
/* Location: ./application/controllers/outputControl.php */