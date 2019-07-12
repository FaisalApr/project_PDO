<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LineManagerModel');
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	public function index()
	{
		$this->load->view('import/importAssyExcel');
	}


	public function import()
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
					$id_assy= 0;
					$kode_assy = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					
					$umh = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$line = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					$cekline=$this->excel_import_model->cekline($line);


					$cek = $this->excel_import_model->ceknama($kode_assy);
					if($cek){
						$id_assy = $cek->id;
					}else{
						$data = array(
							'kode_assy'		=>	$kode_assy,
							'umh'			=>	$umh
						);
						$dt[]=$data;
						$this->excel_import_model->insert($dt);
						$result = $this->excel_import_model->ceknama($kode_assy);
						$id_assy = $result->id;
					}
					$LM = array(
						'id_line' => $cekline->id,
						'id_assy' => $id_assy
					);
					
				}
				$this->LineManagerModel->create($LM);		
			}
			
			echo 'Data Imported successfully';
		}
	}


}

/* End of file excel_import.php */
/* Location: ./application/controllers/excel_import.php */