<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	public function index()
	{
		$this->load->view('import/importAssyExcel');
	}

	// public function fetch()
	// {
	// 	# code...
	// 	$data = $this->excel_import_model->select();
	// 	$output = '
			
	// 	';
	// 	foreach($data->result() as $row)
	// 	{
	// 		$output .= '
	// 		<tr>
	// 			<td>'.$row->kode_assy.'</td>
	// 			<td>'.$row->umh.'</td>
				
	// 		</tr>
	// 		';
	// 	}
	// 	$output .= '</table>';
	// 	echo $output;
	// }

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
					$kode_assy = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$umh = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					// $city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					
					$data[] = array(
						'kode_assy'		=>	$kode_assy,
						'umh'			=>	$umh,
						// 'City'				=>	$city,
						
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}
	}


}

/* End of file excel_import.php */
/* Location: ./application/controllers/excel_import.php */