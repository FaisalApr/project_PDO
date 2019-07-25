<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('LineModel');
		$this->load->model('LineManagerModel');
	}

	public function index()
	{
		$this->load->view('Line/Line_home');
	}

	public function newLine()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataLine = array(
			'nama_line' => $this->input->post('nama_line')
		);

		// insert data new Line
		$result = $this->LineModel->createLine($dataLine);
		if($result){
			// $output ['status'] = "ok";
			
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getLineBasic()
	{
		$core = $this->LineModel->getBasicLine();

		echo json_encode($core);
	}

	public function getLine()
	{
		# code...
		$core = $this->LineModel->getLine();
		$data = array();

		foreach ($core as $key) { 
			$ln = $this->LineManagerModel->getRecordById($key->id_liscarline);	
			$t_umh = $this->LineManagerModel->getTotUmhByCarline($key->id_liscarline);
			$d = array(
					'id_dis' => $key->id_dis,
					'nama_dis' => $key->nama,
					'id_carline' => $key->id_carline,
					'nama_carline' => $key->nama_carline,
					'id_listcarline' => $key->id_liscarline,
					'nama_line' => $key->nama_line,
					'tot_umh' => $t_umh->tot_umh,
					'data_assy' => $ln
				);
			array_push($data, $d);
		} 

		echo json_encode($data);
	}

	public function delLine()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->LineModel->delLine($id);
		echo json_encode($data);
	}

	public function updateLine()
	{
		# code...
		$id = $this->input->post('id');
		$nama = $this->input->post('nama_line');
		$result = $this->LineModel->updateLine($id,$nama);
		echo json_encode($result);
	}

}

/* End of file line.php */
/* Location: ./application/controllers/line.php */