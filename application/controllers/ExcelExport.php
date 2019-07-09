<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style;

class ExcelExport extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pdo_model');
        $this->load->model('Export_model');
	}
 

	public function downloadqcd()
    {  
        // /. CREATING FORMAT STYLE CSS
            $s_default = array(
                            'font' => array(  
                                        'bold' =>true,
                                        'size' => 12,
                                        'name' => 'Calibri'
                                    )
                        );
            $s_status_un = array(
                            'font' => array(
                                        'bold' =>true,
                                        'color' => array('rgb' => 'FF0200'),
                                        'size' => 14,
                                        'name' => 'Verdana'
                                    )
                        );
            $s_status_ok = array(
                            'font' => array(
                                        'bold' =>true,
                                        'color' => array('rgb' => '2CA55A'),
                                        'size' => 14,
                                        'name' => 'Verdana'
                                    )
                        );
            // style tabel
            $s_border_tabel = array( 
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK, 
                                'color' => array( 
                                    'rgb' => '808080' ) 
                            ); 
            $s_border_tabel_info = array( 
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 
                                'color' => array( 
                                    'rgb' => '000000' ) 
                            ); 

        $pdo = $this->input->post('id_pdo');

        $qcd = $this->Export_model->getSumQcd($pdo);
        $r_pdo = $this->Export_model->getDataQcd($pdo); 

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // SEt Default STYLE 
        $spreadsheet->getDefaultStyle()->applyFromArray($s_default);

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
            ->setLastModifiedBy('W&F Media')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Daily Summary Reports');

        // Add some data
        $stat = '';
        if ($r_pdo->status==1) {
            $stat = 'Checked';
            $spreadsheet->getActiveSheet()->getStyle('B7')->applyFromArray($s_status_ok);
        }else{
            $stat = 'Un-Checked';
            $spreadsheet->getActiveSheet()->getStyle('B7')->applyFromArray($s_status_un);
        }
        // tanggal
        $daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $tglparse = DateTime::createFromFormat('Y-m-d H:i:s',$r_pdo->tanggal);
        $tgl = $daysName[$tglparse->format('N')];

        $spreadsheet->setActiveSheetIndex(0) 
            ->setCellValue('C2', 'Daily Summary QCD')
            ->setCellValue('A4', 'Tanggal')
            ->setCellValue('A5', 'Line')
            ->setCellValue('A6', 'Shift')
            ->setCellValue('A7', 'Status')
            //isi header
            ->setCellValue('B4', $tgl.', '.$tglparse->format('d/m/Y'))
            ->setCellValue('B5', $r_pdo->nama_line)
            ->setCellValue('B6', $r_pdo->keterangan)
            ->setCellValue('B7', $stat) 
            //TABEL INFO LABOR
            ->setCellValue('G9', 'MH OUT DL')
            ->setCellValue('G10', 'MH IN DL')
            ->setCellValue('G11', 'MH IN IDL')
            ->setCellValue('G12', 'Direct EFF')
            ->setCellValue('G13', 'STD DL')
            ->setCellValue('G14', 'REG DL')
            //ISI INFO LABOR
            ->setCellValue('H9', round($r_pdo->mh_out,1))
            ->setCellValue('H10', round($r_pdo->mh_in_dl,1))
            ->setCellValue('H11', $r_pdo->mh_in_idl)
            ->setCellValue('H12', round($r_pdo->direct_eff, 2).'%')
            ->setCellValue('H13', $r_pdo->std_dl)
            ->setCellValue('H14', $r_pdo->reg_dl)
            //header TABEL ASSY
            ->setCellValue('A9', 'No')
            ->setCellValue('B9', 'Assy')
            ->setCellValue('C9', 'Total Output')
            ->setCellValue('D9', 'UMH')
            ->setCellValue('E9', 'Total UMH') 
            ;

        // Miscellaneous glyphs, UTF-8
        $no =1;
        $sum_totumh=0;
        $i=10; 
        foreach($qcd as $qcd) {
            $spreadsheet->setActiveSheetIndex(0)  
                ->setCellValue('A'.$i, $no)
                ->setCellValue('B'.$i, $qcd->kode_assy)
                ->setCellValue('C'.$i, $qcd->jumlah)
                ->setCellValue('D'.$i, $qcd->umh)
                ->setCellValue('E'.$i, round($qcd->total,2));

                $sum_totumh += $qcd->total;
                $i++;
                $no++;
        }
        // ISI BOTTOM
        $spreadsheet->setActiveSheetIndex(0)  
                ->setCellValue('D'.($i+2), 'Total')
                ->setCellValue('E'.($i+2), round($sum_totumh,2));

        // STYLE FORMATTING
        $spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(18);
        // $spreadsheet->getActiveSheet()->getColumnFimension('C')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        // center aligment
        $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('H12')->getAlignment()->setHorizontal('right');
        $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+2))->getAlignment()->setHorizontal('right');

        //  TABEL FORMAT 
        $spreadsheet->getActiveSheet()->getStyle('A:Z')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
        $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
        $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
        $spreadsheet->getActiveSheet()->getStyle('G9:H14')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info



        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle("Daily Summary QCD");

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        
        $writer = new Xlsx($spreadsheet);
            
        $filename = "Daily Summary QCD.xlsx";
        
        // unlink('./assets/temp_file/'.$filename);// hapus file lama
        $writer->save('assets/temp_file/'.$filename); // will create and save the file in the root of the project
        
        echo base_url('assets/temp_file/'.$filename);  
    }
	

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */