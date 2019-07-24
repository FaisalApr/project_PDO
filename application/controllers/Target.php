<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('Target_model');
		date_default_timezone_set("Asia/Jakarta");

		// jika tidak memiliki sesi		
		// if (!$this->session->userdata('pdo_logged')) {
		// 	redirect('Login','refresh');
		// }
	}

	


// ==========  AJAX.   =============
  
	public function getThisMonth()
	{ 
		$dat = $this->input->post('tgl');
		$line = $this->input->post('id_line'); 

		$data = $this->Target_model->getDataMonth($dat,$line);

		echo json_encode($data);
	}

	public function getResultThisMonth()
	{ 
		date_default_timezone_set("UTC");

		$dat = $this->input->post('tgl');
		$line = $this->input->post('id_line'); 

		$data = $this->Target_model->getResultDataMonth($dat,$line); 

		echo json_encode($data);
	}


	public function newTargetBulan()
	{ 
		$enddays = $this->input->post('enddays');
		$bln = $this->input->post('bln');
		$tahun = $this->input->post('tahun');
		$arr = array();

		// perulangan insert
		for ($i=1; $i <=$enddays ; $i++) {  
			$tgl = $tahun.'-'.$bln.'-'.$i;

			// new data
			$datanew = array(
				'id_list_carline'	=> $this->input->post('id_cline'),
				'mh_out'	=> $this->input->post('out'),
				'mh_in' 	=> $this->input->post('in'),
				'efisiensi' => $this->input->post('eff'),
				'periode'	=> $tgl,
				'plan_assy' => $this->input->post('plan'),
				'balance_awal' => 0,
				'balance_akhir' => 0
			); 

			$cari = $this->Target_model->cariDataTarget($tgl,$this->input->post('id_cline'));
			// cari jika ada data yang sama
			if (!$cari) {
				array_push($arr, $datanew);
				$this->Target_model->newTarget($datanew);	
			}else{
				// update
				$this->Target_model->edittarget2($datanew,$cari->id);	 
			} 
		}

		echo json_encode($arr);
	}

	public function editMhOut()
	{
		$st = $this->input->post('tgl_start');
		$end = $this->input->post('tgl_end'); 

		$dataedit = array( 
			'mh_out'	=> $this->input->post('out')
		);

		$result = $this->Target_model->edittarget3($dataedit,$st,$end);
		echo json_encode($result);	
	}

	public function editMhIn()
	{
		$st = $this->input->post('tgl_start');
		$end = $this->input->post('tgl_end');

		$dataedit = array( 
			'mh_in'	=> $this->input->post('in')
		);

		$result = $this->Target_model->edittarget3($dataedit,$st,$end);
		echo json_encode($result);	
	}

	public function editEff()
	{  
		$st = $this->input->post('tgl_start');
		$end = $this->input->post('tgl_end'); 

		$dataedit = array( 
			'efisiensi'	=> $this->input->post('eff')
		); 
		$result = $this->Target_model->edittarget3($dataedit,$st,$end);
		echo json_encode($result);	
	}

	public function editBalance()
	{ 
		$dataedit = array( 
			'balance_awal'	=> $this->input->post('bal')
		);

		$result = $this->Target_model->edittarget($dataedit);
		echo json_encode($result);	
	}



}

/* End of file target.php */
/* Location: ./application/controllers/target.php */