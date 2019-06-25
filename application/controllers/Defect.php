<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defect extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Defect_model');
	}

	public function index()
	{
		$data['pdo'] = $this->Defect_model->get_all_record();
		$data['defect'] = $this->Defect_model->get_all_level();
		$this->load->view('defect/defect_templ', $data);

	}

	public function newDefect()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataDefect = array(
			'id_pdo' => $this->input->post('def_id_pdo'),
			'id_jenisdeffect' => $this->input->post('def_id_jenisdeffect'),
			'keterangan' => $this->input->post('def_ket'),
			'total' => $this->input->post('def_total') 
		);

		// insert data new defect
		$result = $this->Defect_model->createDefect($dataDefect);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getDefects()
	{
		# code...
		$data = $this->Defect_model->getDefCode();
		echo json_encode($data);
	}

}

/* End of file defect_form.php */
/* Location: ./application/controllers/defect_form.php */