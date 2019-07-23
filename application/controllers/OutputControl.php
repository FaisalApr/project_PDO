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
		$this->load->model('LineManagerModel');
		$this->load->model('AssyCode_model');
	}
   


   

// ============== Ajaxx. ===========
	
	// func di DASBOARD HOME
		public function getDataOutputControl()
		{
			$id = $this->input->post('id_pdo');

			$result['data'] = $this->OutputControl_model->getOutputControl($id);
			$result['mhin_tot'] = $this->OutputControl_model->getMHintot($id);
			$result['mhin'] = $this->OutputControl_model->getMHin($id);
			$result['mp'] = $this->OutputControl_model->getMP($id);
			$result['to_lossdetik'] = $this->Losstime_model->getToLosstimeDetik($id);
			$result['data_dl'] = $this->DirectLabor_Model->getDl($id);
			$result['pdo'] = $this->Pdo_model->pdoById($id); 
			$result['eff_exc'] = $this->OutputControl_model->getEffExclude($id);
			
			echo json_encode($result);
		}

		public function getDataCari()
		{  
			$sif = $this->input->post('id_sif');
			$date = $this->input->post('tgl');
			$line = $this->input->post('id_line');
			
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

	public function newBuildAssyDadakan()
	{
		$dAssy = array(
			'kode_assy' => $this->input->post('name'),
			'umh' => 0
		);  
		$result = $this->AssyCode_model->createAssyCode($dAssy);
		if ($result) {
			$assy = $this->AssyCode_model->cariAssy($this->input->post('name'));

			// echo json_encode($assy);
			date_default_timezone_set("Asia/Jakarta");
			//data new Buildd
			$dataBuildAssy = array(
				'id_outputcontrol' => $this->input->post('id_oc'),
				'id_pdo' => $this->input->post('pdo'),
				'id_assy' => $assy->id,
				'actual' => 0,
				'time' => date("Y-m-d H:i:s")
			);
			$build = $this->OutputControl_model->createBuildAssyData($dataBuildAssy);
			if ($build) {
				// insert ke line manager
				$data = array(
							'id_list_carline' => $this->input->post('lstcarline'), 
							'id_assy' => $assy->id
						);
				$build = $this->LineManagerModel->create($data);
				// Finish
				echo json_encode($build);
			}else{
				echo json_encode('ERROR INSERT BUILD ASSY');
			} 
		}else{ 
			echo json_encode('ERROR INSERT ASSY');
		}
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