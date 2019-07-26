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
        // Core
            $daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

        $date = $this->input->post('tgl');
        $line = $this->input->post('id_line');
        
        $resA = $this->Pdo_model->getDataByTanggalChange($date,1,$line); 
        $resB = $this->Pdo_model->getDataByTanggalChange($date,2,$line); 

        // Create new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            // SEt Default STYLE 
            $spreadsheet->getDefaultStyle()->applyFromArray($s_default);
            // Set document properties
            $spreadsheet->getProperties()->setCreator('PRO-Departement')
                ->setLastModifiedBy('Wi&Fa Media')
                ->setTitle('Office 2007 XLSX Test Document')
                ->setSubject('Office 2007 XLSX Test Document')
                ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('Daily Summary Reports');

        // JIKA SIF A MEMILIKI DATA
        if ($resA) {//-> A DATA
            $pdoA = $resA->id_pdo;
            $qcdA = $this->Export_model->getSumQcd($pdoA);
            $r_pdoA = $this->Export_model->getDataQcd($pdoA);  

            // Check Status is Checked
                $stat = '';
                if ($r_pdoA->status==1) {
                    $stat = 'Checked';
                    $spreadsheet->getActiveSheet()->getStyle('B7')->applyFromArray($s_status_ok); 
                }else{
                    $stat = 'Un-Checked';
                    $spreadsheet->getActiveSheet()->getStyle('B7')->applyFromArray($s_status_un); 
                }
            // tanggal 
                $tglparse = DateTime::createFromFormat('Y-m-d H:i:s',$r_pdoA->tanggal);
                $tgl = $daysName[$tglparse->format('N')];
            // Data QCD
                $spreadsheet->setActiveSheetIndex(0) 
                    ->setCellValue('C2', 'Daily Summary QCD')
                    ->setCellValue('A4', 'Tanggal')
                    ->setCellValue('A5', 'Line')
                    ->setCellValue('A6', 'Shift')
                    ->setCellValue('A7', 'Status')
                    //isi header
                    ->setCellValue('B4', $tgl.', '.$tglparse->format('d/m/Y'))
                    ->setCellValue('B5', $r_pdoA->nama_line.'  ('.$r_pdoA->nama_carline.')')
                    ->setCellValue('B6', $r_pdoA->keterangan)
                    ->setCellValue('B7', $stat) 
                    //TABEL INFO LABOR
                    ->setCellValue('G9', 'MH OUT DL')
                    ->setCellValue('G10', 'MH IN DL')
                    ->setCellValue('G11', 'MH IN IDL')
                    ->setCellValue('G12', 'Direct EFF')
                    ->setCellValue('G13', 'STD DL')
                    ->setCellValue('G14', 'REG DL')
                    //ISI INFO LABOR
                    ->setCellValue('H9', round($r_pdoA->mh_out,1))
                    ->setCellValue('H10', round($r_pdoA->mh_in_dl,1))
                    ->setCellValue('H11', $r_pdoA->mh_in_idl)
                    ->setCellValue('H12', round($r_pdoA->direct_eff, 2).'%')
                    ->setCellValue('H13', $r_pdoA->std_dl)
                    ->setCellValue('H14', $r_pdoA->reg_dl)
                    //header TABEL ASSY
                    ->setCellValue('A9', 'No')
                    ->setCellValue('B9', 'Assy')
                    ->setCellValue('C9', 'Total Output')
                    ->setCellValue('D9', 'UMH')
                    ->setCellValue('E9', 'Total UMH') 
                    ;
            // TBody QCD
                $no =1;
                $sum_totumh=0;
                $i=10; 
                foreach($qcdA as $qcdA) {
                    $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('A'.$i, $no)
                        ->setCellValue('B'.$i, $qcdA->kode_assy)
                        ->setCellValue('C'.$i, $qcdA->jumlah)
                        ->setCellValue('D'.$i, $qcdA->umh)
                        ->setCellValue('E'.$i, round($qcdA->total,2));

                        $sum_totumh += $qcdA->total;
                        $i++;
                        $no++;
                }    
            // ====================== DOWNTIMW =============================
                $down = $this->Losstime_model->getLosstimeUserrrr($pdoA);
                $widget = $this->Losstime_model->getLosstimeWidget($pdoA);

                $z = $i+9;
                // STATUS
                $stat = '';
                if ($r_pdoA->status==1) {
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
                    ->setCellValue('B'.($z+4), $r_pdoA->nama_line.'  ('.$r_pdoA->nama_carline.')')
                    ->setCellValue('B'.($z+5), $r_pdoA->keterangan)
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
                $spreadsheet->getActiveSheet()->mergeCells('C2:E2'); // judul !
                $spreadsheet->getActiveSheet()->mergeCells('C'.($z).':E'.($z)); // judul 2
                $spreadsheet->getActiveSheet()->mergeCells('D'.($z+8).':E'.($z+8)); //header tabel merge
                // merge info
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+8).':J'.($z+8));
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+9).':J'.($z+9));
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+10).':J'.($z+10));
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+11).':J'.($z+11));
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
                    $spreadsheet->getActiveSheet()->mergeCells('D'.($y).':E'.($y));
                }

            // null data
                $spreadsheet->getActiveSheet()->mergeCells('D'.($y+1).':E'.($y+1));
                $spreadsheet->getActiveSheet()->mergeCells('D'.($y+2).':E'.($y+2));
                $spreadsheet->getActiveSheet()->mergeCells('D'.($y+3).':E'.($y+3));

            // ISI BOTTOM
                $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('D'.($i+2), 'Total')
                        ->setCellValue('E'.($i+2), round($sum_totumh,2));

            // FORMATING
                $spreadsheet->getActiveSheet()->getStyle('C'.$z)->getFont()->setSize(18);
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getAlignment()->setHorizontal('center');
                $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+2))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('K'.($z+8).':K'.($z+11))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+9).':G'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('I'.($z+8).':K'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info

        }else{//--> SIF A KOSONG
            // Check Status is Checked
                $stat = 'No-Data';
                $spreadsheet->getActiveSheet()->getStyle('B7')->applyFromArray($s_status_un); 
            // Data QCD
                $spreadsheet->setActiveSheetIndex(0) 
                    ->setCellValue('C2', 'Daily Summary QCD')
                    ->setCellValue('A4', 'Tanggal')
                    ->setCellValue('A5', 'Line')
                    ->setCellValue('A6', 'Shift')
                    ->setCellValue('A7', 'Status')
                    //isi header
                    ->setCellValue('B4', '-')
                    ->setCellValue('B5', '-')
                    ->setCellValue('B6', '-')
                    ->setCellValue('B7', $stat) 
                    //TABEL INFO LABOR
                    ->setCellValue('G9', 'MH OUT DL')
                    ->setCellValue('G10', 'MH IN DL')
                    ->setCellValue('G11', 'MH IN IDL')
                    ->setCellValue('G12', 'Direct EFF')
                    ->setCellValue('G13', 'STD DL')
                    ->setCellValue('G14', 'REG DL')
                    //ISI INFO LABOR
                    ->setCellValue('H9', '-')
                    ->setCellValue('H10', '-')
                    ->setCellValue('H11', '-')
                    ->setCellValue('H12', '- %')
                    ->setCellValue('H13', '-')
                    ->setCellValue('H14', '-')
                    //header TABEL ASSY
                    ->setCellValue('A9', 'No')
                    ->setCellValue('B9', 'Assy')
                    ->setCellValue('C9', 'Total Output')
                    ->setCellValue('D9', 'UMH')
                    ->setCellValue('E9', 'Total UMH') 
                    ;
            // TBody QCD
                $no =1;
                $sum_totumh=0;
                $i=10;  
            // ====================== DOWNTIMW ============================= 
                $z = $i+9;
                // STATUS
                $stat = 'No-Data';
                $spreadsheet->getActiveSheet()->getStyle('B'.($z+6))->applyFromArray($s_status_un); 
                
                $spreadsheet->setActiveSheetIndex(0) 
                    ->setCellValue('C'.$z, 'Daily Downtime Summary')
                    ->setCellValue('A'.($z+3), 'Tanggal')
                    ->setCellValue('A'.($z+4), 'Line')
                    ->setCellValue('A'.($z+5), 'Shift')
                    ->setCellValue('A'.($z+6), 'Status')
                    //isi header
                    ->setCellValue('B'.($z+3), '-')
                    ->setCellValue('B'.($z+4), '-')
                    ->setCellValue('B'.($z+5), '-')
                    ->setCellValue('B'.($z+6), $stat)

                    // TABEL 
                    ->setCellValue('I'.($z+8), 'Jam Effective')
                    ->setCellValue('I'.($z+9), 'Prosentase Losstime')
                    ->setCellValue('I'.($z+10), 'Total Losstime')
                    ->setCellValue('I'.($z+11), 'Total Exclude')  
                    // TABEL INFO
                    ->setCellValue('K'.($z+8), '- jam')
                    ->setCellValue('K'.($z+9), '- %')
                    ->setCellValue('K'.($z+10), '- jam')
                    ->setCellValue('K'.($z+11), '- jam') 

                    // HEADER TABEL
                    ->setCellValue('A'.($z+8), 'Jam Ke')
                    ->setCellValue('B'.($z+8), 'Kode')
                    ->setCellValue('C'.($z+8), 'Problem')
                    ->setCellValue('D'.($z+8), 'Keterangan')
                    ->setCellValue('F'.($z+8), 'Durasi')
                    ->setCellValue('G'.($z+8), 'Type');
            // Merge
                $spreadsheet->getActiveSheet()->mergeCells('C2:E2'); // judul !
                $spreadsheet->getActiveSheet()->mergeCells('C'.($z).':E'.($z)); // judul 2
                $spreadsheet->getActiveSheet()->mergeCells('D'.($z+8).':E'.($z+8)); //header tabel merge
                // merge info
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+8).':J'.($z+8));
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+9).':J'.($z+9));
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+10).':J'.($z+10));
                $spreadsheet->getActiveSheet()->mergeCells('I'.($z+11).':J'.($z+11));
            //TABEL INFO LABOR
            // Data LIST DOWNTIME
                $y = $z+9; 

            // null data
                $spreadsheet->getActiveSheet()->mergeCells('D'.($y+1).':E'.($y+1));
                $spreadsheet->getActiveSheet()->mergeCells('D'.($y+2).':E'.($y+2));
                $spreadsheet->getActiveSheet()->mergeCells('D'.($y+3).':E'.($y+3));

            // ISI BOTTOM
                $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('D'.($i+2), 'Total')
                        ->setCellValue('E'.($i+2), round($sum_totumh,2));

            // FORMATING
                $spreadsheet->getActiveSheet()->getStyle('C'.$z)->getFont()->setSize(18);
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getAlignment()->setHorizontal('center');
                $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+2))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('K'.($z+8).':K'.($z+11))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+9).':G'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('I'.($z+8).':K'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info
        }
        
        // JIKA SIF B MEMILIKI DATA
        if ($resB) {//-> B DATA
            $pdoB = $resB->id_pdo;
            $qcdB = $this->Export_model->getSumQcd($pdoB);
            $r_pdoB = $this->Export_model->getDataQcd($pdoB);  

            // Check Status is Checked
                $stat = '';
                if ($r_pdoB->status==1) {
                    $stat = 'Checked';
                    $spreadsheet->getActiveSheet()->getStyle('P7')->applyFromArray($s_status_ok); 
                }else{
                    $stat = 'Un-Checked';
                    $spreadsheet->getActiveSheet()->getStyle('P7')->applyFromArray($s_status_un); 
                }
            // tanggal 
                $tglparse = DateTime::createFromFormat('Y-m-d H:i:s',$r_pdoB->tanggal);
                $tgl = $daysName[$tglparse->format('N')];
            // Data QCD
                $spreadsheet->setActiveSheetIndex(0) 
                    ->setCellValue('Q2', 'Daily Summary QCD')
                    ->setCellValue('O4', 'Tanggal')
                    ->setCellValue('O5', 'Line')
                    ->setCellValue('O6', 'Shift')
                    ->setCellValue('O7', 'Status')
                    //isi header
                    ->setCellValue('P4', $tgl.', '.$tglparse->format('d/m/Y'))
                    ->setCellValue('P5', $r_pdoB->nama_line.'  ('.$r_pdoB->nama_carline.')')
                    ->setCellValue('P6', $r_pdoB->keterangan)
                    ->setCellValue('P7', $stat) 
                    //TABEL INFO LABOR
                    ->setCellValue('U9', 'MH OUT DL')
                    ->setCellValue('U10', 'MH IN DL')
                    ->setCellValue('U11', 'MH IN IDL')
                    ->setCellValue('U12', 'Direct EFF')
                    ->setCellValue('U13', 'STD DL')
                    ->setCellValue('U14', 'REG DL')
                    //ISI INFO LABOR
                    ->setCellValue('V9', round($r_pdoB->mh_out,1))
                    ->setCellValue('V10', round($r_pdoB->mh_in_dl,1))
                    ->setCellValue('V11', $r_pdoB->mh_in_idl)
                    ->setCellValue('V12', round($r_pdoB->direct_eff, 2).'%')
                    ->setCellValue('V13', $r_pdoB->std_dl)
                    ->setCellValue('V14', $r_pdoB->reg_dl)
                    //header TABEL ASSY
                    ->setCellValue('O9', 'No')
                    ->setCellValue('P9', 'Assy')
                    ->setCellValue('P9', 'Total Output')
                    ->setCellValue('R9', 'UMH')
                    ->setCellValue('S9', 'Total UMH') 
                    ;
            // TBody QCD
                $no =1;
                $sum_totumh=0;
                $i=10; 
                foreach($qcdB as $qcdB) {
                    $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('O'.$i, $no)
                        ->setCellValue('P'.$i, $qcdB->kode_assy)
                        ->setCellValue('Q'.$i, $qcdB->jumlah)
                        ->setCellValue('R'.$i, $qcdB->umh)
                        ->setCellValue('S'.$i, round($qcdB->total,2));

                        $sum_totumh += $qcdB->total;
                        $i++;
                        $no++;
                }    
            // ====================== DOWNTIMW =============================
                $down = $this->Losstime_model->getLosstimeUserrrr($pdoB);
                $widget = $this->Losstime_model->getLosstimeWidget($pdoB);

                $z = $i+9;
                // STATUS
                    $stat = '';
                    if ($r_pdoB->status==1) {
                        $stat = 'Checked';
                        $spreadsheet->getActiveSheet()->getStyle('P'.($z+6))->applyFromArray($s_status_ok); 
                    }else{
                        $stat = 'Un-Checked';
                        $spreadsheet->getActiveSheet()->getStyle('P'.($z+6))->applyFromArray($s_status_un); 
                    }
                $spreadsheet->setActiveSheetIndex(0) 
                    ->setCellValue('Q'.$z, 'Daily Downtime Summary')
                    ->setCellValue('O'.($z+3), 'Tanggal')
                    ->setCellValue('O'.($z+4), 'Line')
                    ->setCellValue('O'.($z+5), 'Shift')
                    ->setCellValue('O'.($z+6), 'Status')
                    //isi header
                    ->setCellValue('P'.($z+3), $tgl.', '.$tglparse->format('d/m/Y'))
                    ->setCellValue('P'.($z+4), $r_pdoB->nama_line.'  ('.$r_pdoB->nama_carline.')')
                    ->setCellValue('P'.($z+5), $r_pdoB->keterangan)
                    ->setCellValue('P'.($z+6), $stat)

                    // TABEL 
                    ->setCellValue('W'.($z+8), 'Jam Effective')
                    ->setCellValue('W'.($z+9), 'Prosentase Losstime')
                    ->setCellValue('W'.($z+10), 'Total Losstime')
                    ->setCellValue('W'.($z+11), 'Total Exclude')  
                    // TABEL INFO
                    ->setCellValue('Y'.($z+8), round($widget->jam_iff,1).' jam')
                    ->setCellValue('Y'.($z+9), round($widget->losspercent,2).' %')
                    ->setCellValue('Y'.($z+10), round(($widget->to_loss/60),2) .' jam')
                    ->setCellValue('Y'.($z+11), round(($widget->to_exc/60),2) .' jam') 

                    // HEADER TABEL
                    ->setCellValue('O'.($z+8), 'Jam Ke')
                    ->setCellValue('P'.($z+8), 'Kode')
                    ->setCellValue('Q'.($z+8), 'Problem')
                    ->setCellValue('R'.($z+8), 'Keterangan')
                    ->setCellValue('T'.($z+8), 'Durasi')
                    ->setCellValue('U'.($z+8), 'Type');
            // Merge
                $spreadsheet->getActiveSheet()->mergeCells('Q2:S2'); // judul !
                $spreadsheet->getActiveSheet()->mergeCells('Q'.($z).':S'.($z)); // judul 2
                $spreadsheet->getActiveSheet()->mergeCells('R'.($z+8).':S'.($z+8)); //header tabel merge
                // merge info
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+8).':X'.($z+8));
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+9).':X'.($z+9));
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+10).':X'.($z+10));
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+11).':X'.($z+11));
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
                        ->setCellValue('O'.$y, $down->jam_ke)
                        ->setCellValue('P'.$y, $down->kode)
                        ->setCellValue('Q'.$y, $down->problem)
                        ->setCellValue('R'.$y, $down->keterangan)
                        ->setCellValue('T'.$y, $menit.' Menit '.$detik.' dtk')
                        ->setCellValue('U'.$y, $down->jenis); 
                        $y++; 
                    $spreadsheet->getActiveSheet()->mergeCells('R'.($y).':S'.($y));
                }

            // null data
                $spreadsheet->getActiveSheet()->mergeCells('R'.($y+1).':S'.($y+1));
                $spreadsheet->getActiveSheet()->mergeCells('R'.($y+2).':S'.($y+2));
                $spreadsheet->getActiveSheet()->mergeCells('R'.($y+3).':S'.($y+3));

            // ISI BOTTOM
                $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('R'.($i+2), 'Total')
                        ->setCellValue('S'.($i+2), round($sum_totumh,2));
            // FORMATING
                $spreadsheet->getActiveSheet()->getStyle('Q'.$z)->getFont()->setSize(18);
                $spreadsheet->getActiveSheet()->getStyle('Q'.($z+8).':U'.($z+8))->getAlignment()->setHorizontal('center');
                $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+2))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('Y'.($z+8).':Y'.($z+11))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('O'.($z+8).':U'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('O'.($z+9).':U'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('W'.($z+8).':Y'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info

        }else{//--> SIF B KOSONG
            // Check Status is Checked
                $stat = 'No-Data';
                $spreadsheet->getActiveSheet()->getStyle('P7')->applyFromArray($s_status_un);  
            // Data QCD
                $spreadsheet->setActiveSheetIndex(0) 
                    ->setCellValue('Q2', 'Daily Summary QCD')
                    ->setCellValue('O4', 'Tanggal')
                    ->setCellValue('O5', 'Line')
                    ->setCellValue('O6', 'Shift')
                    ->setCellValue('O7', 'Status')
                    //isi header
                    ->setCellValue('P4', '-')
                    ->setCellValue('P5', '-')
                    ->setCellValue('P6', '-')
                    ->setCellValue('P7', $stat) 
                    //TABEL INFO LABOR
                    ->setCellValue('U9', 'MH OUT DL')
                    ->setCellValue('U10', 'MH IN DL')
                    ->setCellValue('U11', 'MH IN IDL')
                    ->setCellValue('U12', 'Direct EFF')
                    ->setCellValue('U13', 'STD DL')
                    ->setCellValue('U14', 'REG DL')
                    //ISI INFO LABOR
                    ->setCellValue('V9', '-')
                    ->setCellValue('V10', '-')
                    ->setCellValue('V11', '-')
                    ->setCellValue('V12', '-')
                    ->setCellValue('V13', '-')
                    ->setCellValue('V14', '-')
                    //header TABEL ASSY
                    ->setCellValue('O9', 'No')
                    ->setCellValue('P9', 'Assy')
                    ->setCellValue('P9', 'Total Output')
                    ->setCellValue('R9', 'UMH')
                    ->setCellValue('S9', 'Total UMH') 
                    ;
            // TBody QCD
                $no =1;
                $sum_totumh=0;
                $i=10;  

            // ====================== DOWNTIMW ============================= 

                $z = $i+9;
                // STATUS
                $stat = 'No-Data';
                $spreadsheet->getActiveSheet()->getStyle('P'.($z+6))->applyFromArray($s_status_un); 

                $spreadsheet->setActiveSheetIndex(0) 
                    ->setCellValue('Q'.$z, 'Daily Downtime Summary')
                    ->setCellValue('O'.($z+3), 'Tanggal')
                    ->setCellValue('O'.($z+4), 'Line')
                    ->setCellValue('O'.($z+5), 'Shift')
                    ->setCellValue('O'.($z+6), 'Status')
                    //isi header
                    ->setCellValue('P'.($z+3), '-')
                    ->setCellValue('P'.($z+4), '-')
                    ->setCellValue('P'.($z+5), '-')
                    ->setCellValue('P'.($z+6), $stat)

                    // TABEL 
                    ->setCellValue('W'.($z+8), 'Jam Effective')
                    ->setCellValue('W'.($z+9), 'Prosentase Losstime')
                    ->setCellValue('W'.($z+10), 'Total Losstime')
                    ->setCellValue('W'.($z+11), 'Total Exclude')  
                    // TABEL INFO
                    ->setCellValue('Y'.($z+8), '- jam')
                    ->setCellValue('Y'.($z+9), '- %')
                    ->setCellValue('Y'.($z+10), '- jam')
                    ->setCellValue('Y'.($z+11), '- jam') 

                    // HEADER TABEL
                    ->setCellValue('O'.($z+8), 'Jam Ke')
                    ->setCellValue('P'.($z+8), 'Kode')
                    ->setCellValue('Q'.($z+8), 'Problem')
                    ->setCellValue('R'.($z+8), 'Keterangan')
                    ->setCellValue('T'.($z+8), 'Durasi')
                    ->setCellValue('U'.($z+8), 'Type');
            // Merge
                $spreadsheet->getActiveSheet()->mergeCells('Q2:S2'); // judul !
                $spreadsheet->getActiveSheet()->mergeCells('Q'.($z).':S'.($z)); // judul 2
                $spreadsheet->getActiveSheet()->mergeCells('R'.($z+8).':S'.($z+8)); //header tabel merge
                // merge info
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+8).':X'.($z+8));
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+9).':X'.($z+9));
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+10).':X'.($z+10));
                $spreadsheet->getActiveSheet()->mergeCells('W'.($z+11).':X'.($z+11));
            //TABEL INFO LABOR
            // Data LIST DOWNTIME
                $y = $z+9;
                

            // null data
                $spreadsheet->getActiveSheet()->mergeCells('R'.($y+1).':S'.($y+1));
                $spreadsheet->getActiveSheet()->mergeCells('R'.($y+2).':S'.($y+2));
                $spreadsheet->getActiveSheet()->mergeCells('R'.($y+3).':S'.($y+3));

            // ISI BOTTOM
                $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('R'.($i+2), 'Total')
                        ->setCellValue('S'.($i+2), round($sum_totumh,2));
            // FORMATING
                $spreadsheet->getActiveSheet()->getStyle('Q'.$z)->getFont()->setSize(18);
                $spreadsheet->getActiveSheet()->getStyle('Q'.($z+8).':U'.($z+8))->getAlignment()->setHorizontal('center');
                $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+2))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('Y'.($z+8).':Y'.($z+11))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('O'.($z+8).':U'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('O'.($z+9).':U'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('W'.($z+8).':Y'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info
        }
        
        // STYLE FORMATTING
            $spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(18);
            $spreadsheet->getActiveSheet()->getStyle('Q2')->getFont()->setSize(18);
            
            

            // $spreadsheet->getActiveSheet()->getColumnFimension('C')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
            $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(14);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(12);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(15);

            // center aligment
            $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('Q9:S9')->getAlignment()->setHorizontal('center');

            $spreadsheet->getActiveSheet()->getStyle('H12')->getAlignment()->setHorizontal('right');
            $spreadsheet->getActiveSheet()->getStyle('V12')->getAlignment()->setHorizontal('right');
            
             
            //  TABEL FORMAT QCD
            $spreadsheet->getActiveSheet()->getStyle('A:Z')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
            $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
            $spreadsheet->getActiveSheet()->getStyle('O9:S9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
            
            $spreadsheet->getActiveSheet()->getStyle('G9:H14')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info
            $spreadsheet->getActiveSheet()->getStyle('U9:V14')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info


            // END FOCUS
            $spreadsheet->getActiveSheet()->setSelectedCell('A1');


        //=============================   FINISHING  ========================================
        $ln = $this->input->post('nam_line');
        $tgl = $this->input->post('tgl_pos');

        // Rename worksheet
        // $spreadsheet->getActiveSheet()->setTitle('Daily Summary QCD '.$tglparse->format('d-m-Y'));
        $spreadsheet->getActiveSheet()->setTitle('Daily Summary QCD '.$ln);
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        
        $writer = new Xlsx($spreadsheet);  
        $filename = $ln.' '.$tgl.'.xlsx';
         
        // unlink('./assets/temp_file/'.$filename);// hapus file lama
        $writer->save('assets/temp_file/'.$filename); // will create and save the file in the root of the project
        
        echo base_url('assets/temp_file/'.$filename);  
    }
	

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */