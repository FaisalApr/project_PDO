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
        $this->load->model('Losstime_model');
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

        $pdo = $this->input->post('id_pd');

        $qcd = $this->Export_model->getSumQcd($pdo);
        $r_pdo = $this->Export_model->getDataQcd($pdo);  

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // SEt Default STYLE 
        $spreadsheet->getDefaultStyle()->applyFromArray($s_default);

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
            ->setLastModifiedBy('Wi&Fa Media')
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

        // ====================== DOWNTIMW =============================
        $down = $this->Losstime_model->getLosstimeUserrrr($pdo);
        $widget = $this->Losstime_model->getLosstimeWidget($pdo);

        $z = $i+9;
        // STATUS
        $stat = '';
        if ($r_pdo->status==1) {
            $stat = 'Checked';
            $spreadsheet->getActiveSheet()->getStyle('B'.($z+6))->applyFromArray($s_status_ok); 
        }else{
            $stat = 'Un-Checked';
            $spreadsheet->getActiveSheet()->getStyle('B'.($z+6))->applyFromArray($s_status_un); 
        }
        $spreadsheet->setActiveSheetIndex(0) 
            ->setCellValue('C'.$z, 'Daily Downtime Summary')
            ->setCellValue('A'.($z+3), 'Tanggal')
            ->setCellValue('A'.($z+4), 'Line')
            ->setCellValue('A'.($z+5), 'Shift')
            ->setCellValue('A'.($z+6), 'Status')
            //isi header
            ->setCellValue('B'.($z+3), $tgl.', '.$tglparse->format('d/m/Y'))
            ->setCellValue('B'.($z+4), $r_pdo->nama_line)
            ->setCellValue('B'.($z+5), $r_pdo->keterangan)
            ->setCellValue('B'.($z+6), $stat)

            // TABEL 
            ->setCellValue('I'.($z+8), 'Jam Effective')
            ->setCellValue('I'.($z+9), 'Prosentase Losstime')
            ->setCellValue('I'.($z+10), 'Total Losstime')
            ->setCellValue('I'.($z+11), 'Total Exclude')  
            // TABEL INFO
            ->setCellValue('K'.($z+8), round($widget->jam_iff,1).' jam')
            ->setCellValue('K'.($z+9), round($widget->losspercent,2).' %')
            ->setCellValue('K'.($z+10), round(($widget->to_loss/60),2) .' jam')
            ->setCellValue('K'.($z+11), round(($widget->to_exc/60),2) .' jam') 

            // HEADER TABEL
            ->setCellValue('A'.($z+8), 'Jam Ke')
            ->setCellValue('B'.($z+8), 'Kode')
            ->setCellValue('C'.($z+8), 'Problem')
            ->setCellValue('D'.($z+8), 'Keterangan')
            ->setCellValue('F'.($z+8), 'Durasi')
            ->setCellValue('G'.($z+8), 'Type');
        // Merge
        $spreadsheet->getActiveSheet()->mergeCells("C2:E2"); // judul !
        $spreadsheet->getActiveSheet()->mergeCells("C".($z).":E".($z)); // judul 2
        $spreadsheet->getActiveSheet()->mergeCells("D".($z+8).":E".($z+8)); //header tabel merge
        // merge info
        $spreadsheet->getActiveSheet()->mergeCells("I".($z+8).":J".($z+8));
        $spreadsheet->getActiveSheet()->mergeCells("I".($z+9).":J".($z+9));
        $spreadsheet->getActiveSheet()->mergeCells("I".($z+10).":J".($z+10));
        $spreadsheet->getActiveSheet()->mergeCells("I".($z+11).":J".($z+11));

        //TABEL INFO LABOR
        // Data LIST DOWNTIME
        $y = $z+9;
        foreach($down as $down) {
            $all = ($down->durasi*60);
            // menit
            $menit = floor(($all%3600)/60);
            // detik
            $detik = floor((($all%3600)%60)/1);

            $spreadsheet->setActiveSheetIndex(0)  
                ->setCellValue('A'.$y, $down->jam_ke)
                ->setCellValue('B'.$y, $down->kode)
                ->setCellValue('C'.$y, $down->problem)
                ->setCellValue('D'.$y, $down->keterangan)
                ->setCellValue('F'.$y, $menit.' Menit '.$detik.' dtk')
                ->setCellValue('G'.$y, $down->jenis); 
                $y++; 
            $spreadsheet->getActiveSheet()->mergeCells("D".($y).":E".($y));
        }

        // null data
        $spreadsheet->getActiveSheet()->mergeCells("D".($y+1).":E".($y+1));
        $spreadsheet->getActiveSheet()->mergeCells("D".($y+2).":E".($y+2));
        $spreadsheet->getActiveSheet()->mergeCells("D".($y+3).":E".($y+3));


        // ISI BOTTOM
        $spreadsheet->setActiveSheetIndex(0)  
                ->setCellValue('D'.($i+2), 'Total')
                ->setCellValue('E'.($i+2), round($sum_totumh,2));

        // STYLE FORMATTING
        $spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(18);
        $spreadsheet->getActiveSheet()->getStyle('C'.$z)->getFont()->setSize(18);

        // $spreadsheet->getActiveSheet()->getColumnFimension('C')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        // center aligment
        $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('H12')->getAlignment()->setHorizontal('right');
        $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+2))->getAlignment()->setHorizontal('right');
        $spreadsheet->getActiveSheet()->getStyle('K'.($z+8).':K'.($z+11))->getAlignment()->setHorizontal('right');

        //  TABEL FORMAT QCD
        $spreadsheet->getActiveSheet()->getStyle('A:Z')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
        $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
        $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
        $spreadsheet->getActiveSheet()->getStyle('G9:H14')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info

        // Tabel Format DOWNTIME
        $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
        $spreadsheet->getActiveSheet()->getStyle('A'.($z+9).':G'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
        $spreadsheet->getActiveSheet()->getStyle('I'.($z+8).':K'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info

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