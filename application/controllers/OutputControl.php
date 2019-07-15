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
			$id = 7;//$this->input->post('id_pdo');

			$result['data'] = $this->OutputControl_model->getOutputControl($id);
			$result['mhin_tot'] = $this->OutputControl_model->getMHintot($id);
			$result['mhin'] = $this->OutputControl_model->getMHin($id);
			$result['mp'] = $this->OutputControl_model->getMP($id);
			$result['to_lossdetik'] = $this->Losstime_model->getToLosstimeDetik($id);
			$result['data_dl'] = $this->DirectLabor_Model->getDl($id);
			$result['pdo'] = $this->Pdo_model->pdoById($id); 
			
			echo json_encode($result);
		}

		public function getDataCari()
		{ 
			// get sesion
			$session_data = $this->session->userdata('pdo_logged');  

			$sif = $this->input->post('name_sif');
			$date = $this->input->post('tgl');
			$line = $this->input->post('tgl');
			
			$result = $this->Pdo_model->getDataByTanggalChange($date,$sif,$line); 

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
		$id = 7;//$this->input->post('id');
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