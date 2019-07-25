<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carline extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('CarlineModel');
	}

	public function index()
	{
		$data['data_com'] = $this->CarlineModel->get_all_level();
		$data['data_line'] = $this->CarlineModel->get_all_level_2();
		$this->load->view('carline/carline_v', $data);	
	}

// carline
	public function newCarline()
	{
		# code...
		// init
		$output = array('error' => false);

		//data new
		$dataCarline = array(
			'id_district' => $this->input->post('id_district'),
			'nama_carline' => $this->input->post('nama_carline')
		);

		// insert data new Line
		$result = $this->CarlineModel->createCarline($dataCarline);
		if($result){
			// $output ['status'] = "ok";
		}else{
			$output['error'] = true;
		}
		echo json_encode($output);
	}

	public function getCarline()
	{
		# code...
		$data = $this->CarlineModel->getCarline();
		$arr_data = array();
		foreach ($data as $key => $value) {
			// isi
			$data = $this->CarlineModel->getRecordById($value->id_carline);
			array_push($arr_data, array(
									'id_carline' => $value->id_carline,
									'id_district' => $value->id_district,
									'nama' => $value->nama,
									'nama_carline' => $value->nama_carline,
									'data_cr' => $data
									));	
		}

		echo json_encode($arr_data);
	}

	public function updateCarline()
	{
		# code...
		$id = $this->input->post('id');
		$id_district = $this->input->post('id_district');
		$nama_carline = $this->input->post('nama_carline');
		$result = $this->CarlineModel->updateCarline($id,$nama_carline,$id_district);
		echo json_encode($result);
	}

	public function delCarline()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->CarlineModel->delCarline($id);
		echo json_encode($data);
	}

// detail carline

	public function newLC()
	{ 
		// init
		$output = array('error' => false);
		$selc_mgr = $this->input->post('id_line');
		$id_cr = $this->input->post('id_carline');
		foreach ($selc_mgr as $key => $value) {
			$data_LC = array(
				'id_carline' => $id_cr,
				'id_line' => $value
			);
			// insert data new defect
			$result = $this->CarlineModel->create($data_LC);

			if($result){
				$output ['status'] = "ok";
				
			}else{
				$output['error'] = true;
			}
		}   
		echo json_encode($output);
	}

	public function getUserById()
	{
		# code...
		$data = $this->CarlineModel->getRecordById($this->input->post('id'));
		echo json_encode($data);
	}

	public function getListById()
	{
		# code...
		$data = $this->CarlineModel->getListById($this->input->post('id'));
		echo json_encode($data);
	}
	public function delLC()
	{
		# code...
		$id = $this->input->post('id');
		$data = $this->CarlineModel->delete($id);
		echo json_encode($data);
	}
	public function getLine()
	{ 
		$selted_line = $this->input->post('data');
		$arr_where = [];

		// jika ini array
		if (is_array($selted_line)) {  
			foreach ($selted_line as $key) {
				$tmp = array(
					'key' => 'id !=',
					'value' => $key['id_line']
					);
				array_push($arr_where, $tmp);
			}
		}
		$data = $this->CarlineModel->getLineArrWhere($arr_where);

		$arr_dat = array();
		foreach ($data as $key => $val) {  
			array_push($arr_dat, array(
										 'id' => $val->id,
					      				'text' => $val->nama_line
									));
		} 
 		
		echo json_encode($arr_dat);
	}

}

/* End of file carline.php */
/* Location: ./application/controllers/carline.php */