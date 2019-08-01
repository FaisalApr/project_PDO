<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LineManagerModel');
		$this->load->model('excel_import_model');
		$this->load->model('AssyCode_model');
		$this->load->model('LineModel');
		$this->load->model('CarlineModel');

		$this->load->library('excel');
	}

	public function index()
	{
		$this->load->view('import/importAssyExcel');
	}


	public function importLineMgr()
	{
		# code...
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			$dat = array();

			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{ 
					// var
					$distric = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$namaCarline = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$namaLine = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$kodeAssy = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$umh = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

					// mencari id district
					$comp = $this->excel_import_model->cekComp($distric); 
					// jika Distric Notfound
					if (!$comp) {
						echo json_encode('ERROR - Distric');
						return;
					}

					$carline = $this->excel_import_model->cekNamaCarline($namaCarline,$comp->id);

					if (!$carline) {
						echo json_encode('ERROR - Nama Carline Not Found');
						return;
					}

					$line = $this->excel_import_model->cekNamaLine($namaLine);
					if (!$line) { 
						echo json_encode('ERROR - Line Not Found / new Line');

							$dat = array('nama_line' => $namaLine );
						// insert new line
						$this->LineModel->createLine($dat);
						$line = $this->excel_import_model->cekNamaLine($namaLine);
					}

					$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);
					// jika tidak ada di list carline
					if (!$lstCarline) {
						echo json_encode('TIdak Ada Di listCarline'); 
						
							$dat = array('id_carline' => $carline->id ,'id_line' => $line->id );
						// insert new listCarline
						$this->CarlineModel->create($dat);
						// carilagi
						$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);
					}

					// cek nama Ass
					$assy = $this->excel_import_model->ceknama($kodeAssy);
					if(!$assy){
						echo json_encode('TIdak Ada ASsy Terdaftar'); 

						$data = array(
							'kode_assy'		=>	$kodeAssy,
							'umh'			=>	$umh
						);//new assy insert
						$this->AssyCode_model->createAssyCode($data);
						$assy = $this->excel_import_model->ceknama($kodeAssy);
					}

					$linMgr = $this->excel_import_model->cekLineManager($lstCarline->id,$assy->id);
					if (!$linMgr) {
						// No Linemanager foundd
						$data = array(
							'id_list_carline'		=>	$lstCarline->id,
							'id_assy'			=>	$assy->id
						);
						$this->LineManagerModel->create($data);
					}  
					
				} 
			}
			
			echo json_encode('okk');
		}
	}



	public function importAssy()
	{
		# code...
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			$dat = array();

			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$id_assy= 0;
					$kode_assy = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					 
					$umh = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$line = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					$assy = $this->excel_import_model->ceknama($kode_assy);

					if($assy){
						$id_assy = $assy->id;
						$data = array(
							'kode_assy'		=>	$kode_assy,
							'umh'			=>	$umh
						);
						// update data
						$a = $this->AssyCode_model->updateACode2($id_assy,$data);
						
					}else{
						$data = array(
							'kode_assy'		=>	$kode_assy,
							'umh'			=>	$umh
						);
						// insert data
						$this->AssyCode_model->createAssyCode($data);
					} 
				} 
			} 
			echo json_encode('okk');
		}
	}


	public function importCarline()
	{
		# code...
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path); 

			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					// var
					$namline = $worksheet->getCellByColumnAndRow(0, $row)->getValue(); 
					$namcarline = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$namcomp = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					// mencari id district
					$comp = $this->excel_import_model->cekComp($namcomp); 
					// jika Distric Notfound
					if (!$comp) {
						echo json_encode('ERROR - Distric');
						return;
					}

					// Mencari Carline
					$carline = $this->excel_import_model->cekNamaCarline($namcarline,$comp->id);
					if (!$carline) {
						echo json_encode('ERROR - Nama Carline Not Found');
						// proses insert
						$dat = array('id_district' => $comp->id ,'nama_carline' => $namcarline );
						$this->CarlineModel->createCarline($dat);
						// mencarilagi
						$carline = $this->excel_import_model->cekNamaCarline($namcarline,$comp->id);
					}
					
					// mencari Line
					$line = $this->excel_import_model->cekNamaLine($namline);
					if (!$line) { 
						echo json_encode('ERROR - Line Not Found / new Line');

							$dat = array('nama_line' => $namline );
						// insert new line
						$this->LineModel->createLine($dat);
						$line = $this->excel_import_model->cekNamaLine($namline);
					}

					// mencari list carline jika ada
					$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);
					// jika tidak ada di list carline
					if (!$lstCarline) {
						echo json_encode('TIdak Ada Di listCarline'); 
						
							$dat = array('id_carline' => $carline->id ,'id_line' => $line->id );
						// insert new listCarline
						$this->CarlineModel->create($dat); 
					}
				} 
			} 
			echo json_encode('okk');
		}
	}


}

/* End of file excel_import.php */
/* Location: ./application/controllers/excel_import.php */