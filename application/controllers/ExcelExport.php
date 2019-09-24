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
        $this->load->model('DirectLabor_Model');
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
            // core
                $qcdA = $this->Export_model->getSumQcd($pdoA);
                $r_pdoA = $this->Export_model->getDataQcd($pdoA);  
                $tot_inact = $this->DirectLabor_Model->getindrectactiv($pdoA); // Indirect Activity TOTAL
                $tot_nonopr = $this->DirectLabor_Model->getnonoprthours($pdoA); // Indirect NON Operating TOTAL
                $data_dl = $this->DirectLabor_Model->getDataDirectLab($pdoA); // Data DL 
                $bantuanIn = $this->DirectLabor_Model->getRegulasiIn($pdoA); // Bantuan In
                $bantuanOut = $this->DirectLabor_Model->getRegulasiOut($pdoA); // Bantuan Out
             
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
                    ->setCellValue('G15', 'MH OT')
                    ->setCellValue('G16', 'Non Operating Hours')
                    ->setCellValue('G17', 'Indirect Activity')
                    ->setCellValue('G18', 'MP Bantuan IN')
                    ->setCellValue('G19', 'MP Bantuan Out')
                    //ISI INFO LABOR
                    ->setCellValue('I9', round($r_pdoA->mh_out,1))
                    ->setCellValue('I10', round($r_pdoA->mh_in_dl,1))
                    ->setCellValue('I11', $r_pdoA->mh_in_idl)
                    ->setCellValue('I12', round($r_pdoA->direct_eff, 2).'%')
                    ->setCellValue('I13', $r_pdoA->std_dl)
                    ->setCellValue('I14', $r_pdoA->reg_dl)
                    ->setCellValue('I15', $data_dl->dl_ot )
                    ->setCellValue('I16', $tot_nonopr->tot )
                    ->setCellValue('I17', $tot_inact->tot )
                    ->setCellValue('I18', $bantuanIn->tot )
                    ->setCellValue('I19', $bantuanOut->tot )
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
                // ISI
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
                    ->setCellValue('J'.($z+8), 'Jam Effective')
                    ->setCellValue('J'.($z+9), 'Prosentase Losstime')
                    ->setCellValue('J'.($z+10), 'Total Losstime')
                    ->setCellValue('J'.($z+11), 'Total Exclude')  
                    // TABEL INFO
                    ->setCellValue('L'.($z+8), round($widget->jam_iff,1).' jam')
                    ->setCellValue('L'.($z+9), round($widget->losspercent,2).' %')
                    ->setCellValue('L'.($z+10), round(($widget->to_loss/60),2) .' jam')
                    ->setCellValue('L'.($z+11), round(($widget->to_exc/60),2) .' jam') 

                    // HEADER TABEL
                    ->setCellValue('A'.($z+8), 'Jam Ke')
                    ->setCellValue('B'.($z+8), 'Kode')
                    ->setCellValue('C'.($z+8), 'Kode Pasi')
                    ->setCellValue('D'.($z+8), 'Problem')
                    ->setCellValue('E'.($z+8), 'Keterangan')
                    ->setCellValue('G'.($z+8), 'Durasi')
                    ->setCellValue('H'.($z+8), 'Type');
            // Merge
                $spreadsheet->getActiveSheet()->mergeCells('C2:E2'); // judul !
                $spreadsheet->getActiveSheet()->mergeCells('C'.($z).':E'.($z)); // judul 2
                $spreadsheet->getActiveSheet()->mergeCells('E'.($z+8).':F'.($z+8)); //header tabel merge
                // merge Info QCD
                $spreadsheet->getActiveSheet()->mergeCells('G9:H9');
                $spreadsheet->getActiveSheet()->mergeCells('G10:H10');
                $spreadsheet->getActiveSheet()->mergeCells('G11:H11');
                $spreadsheet->getActiveSheet()->mergeCells('G12:H12');
                $spreadsheet->getActiveSheet()->mergeCells('G13:H13');
                $spreadsheet->getActiveSheet()->mergeCells('G14:H14');
                $spreadsheet->getActiveSheet()->mergeCells('G15:H15');
                $spreadsheet->getActiveSheet()->mergeCells('G16:H16');
                $spreadsheet->getActiveSheet()->mergeCells('G17:H17');
                $spreadsheet->getActiveSheet()->mergeCells('G18:H18');
                $spreadsheet->getActiveSheet()->mergeCells('G19:H19');
                // merge info Downtime
                $spreadsheet->getActiveSheet()->mergeCells('J'.($z+8).':K'.($z+8));
                $spreadsheet->getActiveSheet()->mergeCells('J'.($z+9).':K'.($z+9));
                $spreadsheet->getActiveSheet()->mergeCells('J'.($z+10).':K'.($z+10));
                $spreadsheet->getActiveSheet()->mergeCells('J'.($z+11).':K'.($z+11));
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
                        ->setCellValue('C'.$y, $down->kodepasi)
                        ->setCellValue('D'.$y, $down->problem)
                        ->setCellValue('E'.$y, $down->keterangan)
                        ->setCellValue('G'.$y, $menit.' Menit '.$detik.' dtk')
                        ->setCellValue('H'.$y, $down->jenis); 
                    // set
                        $spreadsheet->getActiveSheet()->getStyle('B'.$y)->getAlignment()->setHorizontal('center');
                        $spreadsheet->getActiveSheet()->mergeCells('E'.($y).':F'.($y));
                        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(14); //Lebar Problem
                    $y++;  
                }

            // null data Downtime Bawah
                $spreadsheet->getActiveSheet()->mergeCells('E'.($y).':F'.($y));
                $spreadsheet->getActiveSheet()->mergeCells('E'.($y+1).':F'.($y+1));
                $spreadsheet->getActiveSheet()->mergeCells('E'.($y+2).':F'.($y+2));
                $spreadsheet->getActiveSheet()->mergeCells('E'.($y+3).':F'.($y+3));

            // ISI BOTTOM
                $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('D'.($i+2), 'Total')
                        ->setCellValue('E'.($i+2), round($sum_totumh,2));

            // FORMATING  
                $spreadsheet->getActiveSheet()->getStyle('C'.$z)->getFont()->setSize(18);
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getAlignment()->setHorizontal('center');
                $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+2))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('L'.($z+8).':L'.($z+11))->getAlignment()->setHorizontal('right'); //info data right
                $spreadsheet->getActiveSheet()->getStyle('I9:I19')->getAlignment()->setHorizontal('right'); 

                $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':H'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('A'.($z+9).':H'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('J'.($z+8).':L'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info

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
                    ->setCellValue('G15', 'MH OT')
                    ->setCellValue('G16', 'Non Operating Hours')
                    ->setCellValue('G17', 'Indirect Activity')
                    ->setCellValue('G18', 'MP Bantuan IN')
                    ->setCellValue('G19', 'MP Bantuan Out')
                    //ISI INFO LABOR
                    ->setCellValue('I9', '-')
                    ->setCellValue('I10', '-')
                    ->setCellValue('I11', '-')
                    ->setCellValue('I12', '- %')
                    ->setCellValue('I13', '-')
                    ->setCellValue('I14', '-')
                    ->setCellValue('I15', '-' )
                    ->setCellValue('I16', '-')
                    ->setCellValue('I17', '-' )
                    ->setCellValue('I18', '-')
                    ->setCellValue('I19', '-')
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
            // core
                $qcdB = $this->Export_model->getSumQcd($pdoB);
                $r_pdoB = $this->Export_model->getDataQcd($pdoB);  
                $tot_inact = $this->DirectLabor_Model->getindrectactiv($pdoB); // Indirect Activity TOTAL
                $tot_nonopr = $this->DirectLabor_Model->getnonoprthours($pdoB); // Indirect NON Operating TOTAL
                $data_dl = $this->DirectLabor_Model->getDataDirectLab($pdoB); // Data DL 
                $bantuanIn = $this->DirectLabor_Model->getRegulasiIn($pdoB); // Bantuan In
                $bantuanOut = $this->DirectLabor_Model->getRegulasiOut($pdoB); // Bantuan Out

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
                    ->setCellValue('U15', 'MH OT')
                    ->setCellValue('U16', 'Non Operating Hours')
                    ->setCellValue('U17', 'Indirect Activity')
                    ->setCellValue('U18', 'MP Bantuan IN')
                    ->setCellValue('U19', 'MP Bantuan Out')
                    //ISI INFO LABOR
                    ->setCellValue('W9', round($r_pdoB->mh_out,1))
                    ->setCellValue('W10', round($r_pdoB->mh_in_dl,1))
                    ->setCellValue('W11', $r_pdoB->mh_in_idl)
                    ->setCellValue('W12', round($r_pdoB->direct_eff, 2).'%')
                    ->setCellValue('W13', $r_pdoB->std_dl)
                    ->setCellValue('W14', $r_pdoB->reg_dl)
                    ->setCellValue('W15', $data_dl->dl_ot )
                    ->setCellValue('W16', $tot_nonopr->tot )
                    ->setCellValue('W17', $tot_inact->tot )
                    ->setCellValue('W18', $bantuanIn->tot )
                    ->setCellValue('W19', $bantuanOut->tot )
                    //header TABEL ASSY
                    ->setCellValue('O9', 'No')
                    ->setCellValue('P9', 'Assy')
                    ->setCellValue('Q9', 'Total Output')
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
                    ->setCellValue('X'.($z+8), 'Jam Effective')
                    ->setCellValue('X'.($z+9), 'Prosentase Losstime')
                    ->setCellValue('X'.($z+10), 'Total Losstime')
                    ->setCellValue('X'.($z+11), 'Total Exclude')  
                    // TABEL INFO
                    ->setCellValue('Z'.($z+8), round($widget->jam_iff,1).' jam')
                    ->setCellValue('Z'.($z+9), round($widget->losspercent,2).' %')
                    ->setCellValue('Z'.($z+10), round(($widget->to_loss/60),2) .' jam')
                    ->setCellValue('Z'.($z+11), round(($widget->to_exc/60),2) .' jam') 

                    // HEADER TABEL
                    ->setCellValue('O'.($z+8), 'Jam Ke')
                    ->setCellValue('P'.($z+8), 'Kode')
                    ->setCellValue('Q'.($z+8), 'Kode Pasi')
                    ->setCellValue('R'.($z+8), 'Problem')
                    ->setCellValue('S'.($z+8), 'Keterangan') //merge 2 col
                    ->setCellValue('U'.($z+8), 'Durasi')
                    ->setCellValue('V'.($z+8), 'Type');
            // Merge
                $spreadsheet->getActiveSheet()->mergeCells('Q2:S2'); // judul !
                $spreadsheet->getActiveSheet()->mergeCells('Q'.($z).':S'.($z)); // judul 2
                $spreadsheet->getActiveSheet()->mergeCells('S'.($z+8).':T'.($z+8)); //header tabel merge
                // merge Info QCD
                $spreadsheet->getActiveSheet()->mergeCells('U9:V9');
                $spreadsheet->getActiveSheet()->mergeCells('U10:V10');
                $spreadsheet->getActiveSheet()->mergeCells('U11:V11');
                $spreadsheet->getActiveSheet()->mergeCells('U12:V12');
                $spreadsheet->getActiveSheet()->mergeCells('U13:V13');
                $spreadsheet->getActiveSheet()->mergeCells('U14:V14');
                $spreadsheet->getActiveSheet()->mergeCells('U15:V15');
                $spreadsheet->getActiveSheet()->mergeCells('U16:V16');
                $spreadsheet->getActiveSheet()->mergeCells('U17:V17');
                $spreadsheet->getActiveSheet()->mergeCells('U18:V18');
                $spreadsheet->getActiveSheet()->mergeCells('U19:V19');
                // merge info Down
                $spreadsheet->getActiveSheet()->mergeCells('X'.($z+8).':Y'.($z+8));
                $spreadsheet->getActiveSheet()->mergeCells('X'.($z+9).':Y'.($z+9));
                $spreadsheet->getActiveSheet()->mergeCells('X'.($z+10).':Y'.($z+10));
                $spreadsheet->getActiveSheet()->mergeCells('X'.($z+11).':Y'.($z+11));
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
                        ->setCellValue('Q'.$y, $down->kodepasi)
                        ->setCellValue('R'.$y, $down->problem)
                        ->setCellValue('S'.$y, $down->keterangan)
                        ->setCellValue('U'.$y, $menit.' Menit '.$detik.' dtk')
                        ->setCellValue('V'.$y, $down->jenis); 
                    // set
                        $spreadsheet->getActiveSheet()->getStyle('P'.$y)->getAlignment()->setHorizontal('center');
                        $spreadsheet->getActiveSheet()->mergeCells('S'.($y).':T'.($y));    
                        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(14); //Lebar Problem
                    $y++;  
                }

            // null data Bottom 
                $spreadsheet->getActiveSheet()->mergeCells('S'.($y).':T'.($y));
                $spreadsheet->getActiveSheet()->mergeCells('S'.($y+1).':T'.($y+1));
                $spreadsheet->getActiveSheet()->mergeCells('S'.($y+2).':T'.($y+2));
                $spreadsheet->getActiveSheet()->mergeCells('S'.($y+3).':T'.($y+3));

            // ISI BOTTOM
                $spreadsheet->setActiveSheetIndex(0)  
                        ->setCellValue('R'.($i+2), 'Total')
                        ->setCellValue('S'.($i+2), round($sum_totumh,2));
            // FORMATING
                $spreadsheet->getActiveSheet()->getStyle('Q'.$z)->getFont()->setSize(18);
                $spreadsheet->getActiveSheet()->getStyle('Q'.($z+8).':V'.($z+8))->getAlignment()->setHorizontal('center');
                $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+2))->getAlignment()->setHorizontal('right');
                $spreadsheet->getActiveSheet()->getStyle('Z'.($z+8).':Z'.($z+11))->getAlignment()->setHorizontal('right'); //info data right
                $spreadsheet->getActiveSheet()->getStyle('W9:W19')->getAlignment()->setHorizontal('right'); 

                $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('O'.($z+8).':V'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('O'.($z+9).':V'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('X'.($z+8).':Z'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info 

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

            // center aligment QCD
            $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('O9:S9')->getAlignment()->setHorizontal('center');

            $spreadsheet->getActiveSheet()->getStyle('H12')->getAlignment()->setHorizontal('right');
            $spreadsheet->getActiveSheet()->getStyle('V12')->getAlignment()->setHorizontal('right');
            
             
            //  TABEL FORMAT QCD
            $spreadsheet->getActiveSheet()->getStyle('A:ZZ')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
            $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main A
            $spreadsheet->getActiveSheet()->getStyle('O9:S9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main B
            
            $spreadsheet->getActiveSheet()->getStyle('G9:I19')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info A --> ATAS
            $spreadsheet->getActiveSheet()->getStyle('U9:W19')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info B


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
            $filename = $ln.'-'.$tgl.'.xlsx';
             
            // unlink('./assets/temp_file/'.$filename);// hapus file lama
            $writer->save('assets/temp_file/'.$filename); // will create and save the file in the root of the project
        
        echo base_url('assets/temp_file/'.$filename);  
    }


    public function downloadallcarlineqcd()
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

        $tgl_pos = $this->input->post('tgl_pos');
        $date = $this->input->post('tgl');
        $line = $this->input->post('id_line'); 
        $dis = $this->input->post('dis'); 
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
            $sheet = $spreadsheet->getActiveSheet();

        // get Carline terpilih
        $carl = $this->Export_model->cariDataCarlineByDis($dis); 
        for ($ix=0; $ix <sizeof($carl) ; $ix++) { 
            // GET DATA
            $resA = $this->Pdo_model->getDataByTanggalChange($date,1,$carl[$ix]->id); 
            $resB = $this->Pdo_model->getDataByTanggalChange($date,2,$carl[$ix]->id); 
            // Add new sheet
            $spreadsheet->createSheet($ix);  
            $spreadsheet->setActiveSheetIndex($ix);

            // JIKA SIF A MEMILIKI DATA
            if ($resA) {//-> A DATA
                $pdoA = $resA->id_pdo;
                // core
                    $qcdA = $this->Export_model->getSumQcd($pdoA);
                    $r_pdoA = $this->Export_model->getDataQcd($pdoA);  
                    $tot_inact = $this->DirectLabor_Model->getindrectactiv($pdoA); // Indirect Activity TOTAL
                    $tot_nonopr = $this->DirectLabor_Model->getnonoprthours($pdoA); // Indirect NON Operating TOTAL
                    $data_dl = $this->DirectLabor_Model->getDataDirectLab($pdoA); // Data DL 
                    $bantuanIn = $this->DirectLabor_Model->getRegulasiIn($pdoA); // Bantuan In
                    $bantuanOut = $this->DirectLabor_Model->getRegulasiOut($pdoA); // Bantuan Out
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
                    $spreadsheet->setActiveSheetIndex($ix) 
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
                        ->setCellValue('G15', 'MH OT')
                        ->setCellValue('G16', 'Non Operating Hours')
                        ->setCellValue('G17', 'Indirect Activity')
                        ->setCellValue('G18', 'MP Bantuan IN')
                        ->setCellValue('G19', 'MP Bantuan Out')
                        //ISI INFO LABOR
                        ->setCellValue('I9', round($r_pdoA->mh_out,1))
                        ->setCellValue('I10', round($r_pdoA->mh_in_dl,1))
                        ->setCellValue('I11', $r_pdoA->mh_in_idl)
                        ->setCellValue('I12', round($r_pdoA->direct_eff, 2).'%')
                        ->setCellValue('I13', $r_pdoA->std_dl)
                        ->setCellValue('I14', $r_pdoA->reg_dl)
                        ->setCellValue('I15', $data_dl->dl_ot )
                        ->setCellValue('I16', $tot_nonopr->tot )
                        ->setCellValue('I17', $tot_inact->tot )
                        ->setCellValue('I18', $bantuanIn->tot )
                        ->setCellValue('I19', $bantuanOut->tot )
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
                        $spreadsheet->setActiveSheetIndex($ix)  
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
                    $spreadsheet->setActiveSheetIndex($ix) 
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
                        ->setCellValue('J'.($z+8), 'Jam Effective')
                        ->setCellValue('J'.($z+9), 'Prosentase Losstime')
                        ->setCellValue('J'.($z+10), 'Total Losstime')
                        ->setCellValue('J'.($z+11), 'Total Exclude')  
                        // TABEL INFO
                        ->setCellValue('L'.($z+8), round($widget->jam_iff,1).' jam')
                        ->setCellValue('L'.($z+9), round($widget->losspercent,2).' %')
                        ->setCellValue('L'.($z+10), round(($widget->to_loss/60),2) .' jam')
                        ->setCellValue('L'.($z+11), round(($widget->to_exc/60),2) .' jam') 

                        // HEADER TABEL
                        ->setCellValue('A'.($z+8), 'Jam Ke')
                        ->setCellValue('B'.($z+8), 'Kode')
                        ->setCellValue('C'.($z+8), 'Kode Pasi')
                        ->setCellValue('D'.($z+8), 'Problem')
                        ->setCellValue('E'.($z+8), 'Keterangan')
                        ->setCellValue('G'.($z+8), 'Durasi')
                        ->setCellValue('H'.($z+8), 'Type');
                // Merge
                    $spreadsheet->getActiveSheet()->mergeCells('C2:E2'); // judul !
                    $spreadsheet->getActiveSheet()->mergeCells('C'.($z).':E'.($z)); // judul 2
                    $spreadsheet->getActiveSheet()->mergeCells('E'.($z+8).':F'.($z+8)); //header tabel merge
                    // merge Info QCD
                    $spreadsheet->getActiveSheet()->mergeCells('G9:H9');
                    $spreadsheet->getActiveSheet()->mergeCells('G10:H10');
                    $spreadsheet->getActiveSheet()->mergeCells('G11:H11');
                    $spreadsheet->getActiveSheet()->mergeCells('G12:H12');
                    $spreadsheet->getActiveSheet()->mergeCells('G13:H13');
                    $spreadsheet->getActiveSheet()->mergeCells('G14:H14');
                    $spreadsheet->getActiveSheet()->mergeCells('G15:H15');
                    $spreadsheet->getActiveSheet()->mergeCells('G16:H16');
                    $spreadsheet->getActiveSheet()->mergeCells('G17:H17');
                    $spreadsheet->getActiveSheet()->mergeCells('G18:H18');
                    $spreadsheet->getActiveSheet()->mergeCells('G19:H19');
                    // merge info
                    $spreadsheet->getActiveSheet()->mergeCells('J'.($z+8).':K'.($z+8));
                    $spreadsheet->getActiveSheet()->mergeCells('J'.($z+9).':K'.($z+9));
                    $spreadsheet->getActiveSheet()->mergeCells('J'.($z+10).':K'.($z+10));
                    $spreadsheet->getActiveSheet()->mergeCells('J'.($z+11).':K'.($z+11));
                //TABEL INFO LABOR
                // Data LIST DOWNTIME
                    $y = $z+9;
                    foreach($down as $down) {
                        $all = ($down->durasi*60);
                        // menit
                        $menit = floor(($all%3600)/60);
                        // detik
                        $detik = floor((($all%3600)%60)/1);

                        $spreadsheet->setActiveSheetIndex($ix)  
                            ->setCellValue('A'.$y, $down->jam_ke)
                            ->setCellValue('B'.$y, $down->kode)
                            ->setCellValue('C'.$y, $down->kodepasi)
                            ->setCellValue('D'.$y, $down->problem)
                            ->setCellValue('E'.$y, $down->keterangan)
                            ->setCellValue('G'.$y, $menit.' Menit '.$detik.' dtk')
                            ->setCellValue('H'.$y, $down->jenis); 
                        // set
                            $spreadsheet->getActiveSheet()->getStyle('B'.$y)->getAlignment()->setHorizontal('center');
                            $spreadsheet->getActiveSheet()->mergeCells('E'.($y).':F'.($y));
                            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(14); //Lebar Problem
                        $y++;  
                    }

                // null data
                    $spreadsheet->getActiveSheet()->mergeCells('E'.($y).':F'.($y));
                    $spreadsheet->getActiveSheet()->mergeCells('E'.($y+1).':F'.($y+1));
                    $spreadsheet->getActiveSheet()->mergeCells('E'.($y+2).':F'.($y+2));
                    $spreadsheet->getActiveSheet()->mergeCells('E'.($y+3).':F'.($y+3));

                // ISI BOTTOM
                    $spreadsheet->setActiveSheetIndex($ix)  
                            ->setCellValue('D'.($i+2), 'Total')
                            ->setCellValue('E'.($i+2), round($sum_totumh,2));

                // FORMATING
                    $spreadsheet->getActiveSheet()->getStyle('C'.$z)->getFont()->setSize(18);
                    $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':G'.($z+8))->getAlignment()->setHorizontal('center');
                    $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+2))->getAlignment()->setHorizontal('right');
                    $spreadsheet->getActiveSheet()->getStyle('L'.($z+8).':L'.($z+11))->getAlignment()->setHorizontal('right'); //info data right
                    $spreadsheet->getActiveSheet()->getStyle('I9:I19')->getAlignment()->setHorizontal('right'); 

                    $spreadsheet->getActiveSheet()->getStyle('A10:E'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                    $spreadsheet->getActiveSheet()->getStyle('A'.($z+8).':H'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                    $spreadsheet->getActiveSheet()->getStyle('A'.($z+9).':H'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                    $spreadsheet->getActiveSheet()->getStyle('J'.($z+8).':L'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info

                    $spreadsheet->getActiveSheet()->getStyle('G9:I19')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info 
            }else{//--> SIF A KOSONG
                // Check Status is Checked
                    $stat = 'No-Data';
                    $spreadsheet->getActiveSheet()->getStyle('B7')->applyFromArray($s_status_un); 
                // Data QCD
                    $spreadsheet->setActiveSheetIndex($ix)
                        ->setCellValue('C2', 'Daily Summary QCD')
                        ->setCellValue('A4', 'Tanggal')
                        ->setCellValue('A5', 'Line')
                        ->setCellValue('A6', 'Shift')
                        ->setCellValue('A7', 'Status')
                        //isi header
                        ->setCellValue('B4', $tgl_pos)
                        ->setCellValue('B5', $carl[$ix]->nama_line)
                        ->setCellValue('B6', 'A')
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
                    
                    $spreadsheet->setActiveSheetIndex($ix) 
                        ->setCellValue('C'.$z, 'Daily Downtime Summary')
                        ->setCellValue('A'.($z+3), 'Tanggal')
                        ->setCellValue('A'.($z+4), 'Line')
                        ->setCellValue('A'.($z+5), 'Shift')
                        ->setCellValue('A'.($z+6), 'Status')
                        //isi header
                        ->setCellValue('B'.($z+3), $tgl_pos)
                        ->setCellValue('B'.($z+4), $carl[$ix]->nama_line)
                        ->setCellValue('B'.($z+5), 'A')
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
                    $spreadsheet->setActiveSheetIndex($ix)  
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

                    $spreadsheet->getActiveSheet()->getStyle('G9:H14')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info 
            } 
            // JIKA SIF B MEMILIKI DATA
            if ($resB) {//-> B DATA
                $pdoB = $resB->id_pdo;
                // Core
                    $qcdB = $this->Export_model->getSumQcd($pdoB);
                    $r_pdoB = $this->Export_model->getDataQcd($pdoB);  
                    $tot_inact = $this->DirectLabor_Model->getindrectactiv($pdoB); // Indirect Activity TOTAL
                    $tot_nonopr = $this->DirectLabor_Model->getnonoprthours($pdoB); // Indirect NON Operating TOTAL
                    $data_dl = $this->DirectLabor_Model->getDataDirectLab($pdoB); // Data DL 
                    $bantuanIn = $this->DirectLabor_Model->getRegulasiIn($pdoB); // Bantuan In
                    $bantuanOut = $this->DirectLabor_Model->getRegulasiOut($pdoB); // Bantuan Out

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
                    $spreadsheet->setActiveSheetIndex($ix) 
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
                        ->setCellValue('U15', 'MH OT')
                        ->setCellValue('U16', 'Non Operating Hours')
                        ->setCellValue('U17', 'Indirect Activity')
                        ->setCellValue('U18', 'MP Bantuan IN')
                        ->setCellValue('U19', 'MP Bantuan Out')
                        //ISI INFO LABOR
                        ->setCellValue('W9', round($r_pdoB->mh_out,1))
                        ->setCellValue('W10', round($r_pdoB->mh_in_dl,1))
                        ->setCellValue('W11', $r_pdoB->mh_in_idl)
                        ->setCellValue('W12', round($r_pdoB->direct_eff, 2).'%')
                        ->setCellValue('W13', $r_pdoB->std_dl)
                        ->setCellValue('W14', $r_pdoB->reg_dl)
                        ->setCellValue('W15', $data_dl->dl_ot )
                        ->setCellValue('W16', $tot_nonopr->tot )
                        ->setCellValue('W17', $tot_inact->tot )
                        ->setCellValue('W18', $bantuanIn->tot )
                        ->setCellValue('W19', $bantuanOut->tot )
                        //header TABEL ASSY
                        ->setCellValue('O9', 'No')
                        ->setCellValue('P9', 'Assy')
                        ->setCellValue('Q9', 'Total Output')
                        ->setCellValue('R9', 'UMH')
                        ->setCellValue('S9', 'Total UMH') 
                        ;
                // TBody QCD
                    $no =1;
                    $sum_totumh=0;
                    $i=10; 
                    foreach($qcdB as $qcdB) {
                        $spreadsheet->setActiveSheetIndex($ix)  
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
                    $spreadsheet->setActiveSheetIndex($ix) 
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
                        ->setCellValue('X'.($z+8), 'Jam Effective')
                        ->setCellValue('X'.($z+9), 'Prosentase Losstime')
                        ->setCellValue('X'.($z+10), 'Total Losstime')
                        ->setCellValue('X'.($z+11), 'Total Exclude')  
                        // TABEL INFO
                        ->setCellValue('Z'.($z+8), round($widget->jam_iff,1).' jam')
                        ->setCellValue('Z'.($z+9), round($widget->losspercent,2).' %')
                        ->setCellValue('Z'.($z+10), round(($widget->to_loss/60),2) .' jam')
                        ->setCellValue('Z'.($z+11), round(($widget->to_exc/60),2) .' jam') 

                        // HEADER TABEL
                        ->setCellValue('O'.($z+8), 'Jam Ke')
                        ->setCellValue('P'.($z+8), 'Kode')
                        ->setCellValue('Q'.($z+8), 'Kode Pasi')
                        ->setCellValue('R'.($z+8), 'Problem')
                        ->setCellValue('S'.($z+8), 'Keterangan') //merge 2 col
                        ->setCellValue('U'.($z+8), 'Durasi')
                        ->setCellValue('V'.($z+8), 'Type');
                // Merge
                    $spreadsheet->getActiveSheet()->mergeCells('Q2:S2'); // judul !
                    $spreadsheet->getActiveSheet()->mergeCells('Q'.($z).':S'.($z)); // judul 2
                    $spreadsheet->getActiveSheet()->mergeCells('S'.($z+8).':T'.($z+8)); //header tabel merge
                    // merge Info QCD
                    $spreadsheet->getActiveSheet()->mergeCells('U9:V9');
                    $spreadsheet->getActiveSheet()->mergeCells('U10:V10');
                    $spreadsheet->getActiveSheet()->mergeCells('U11:V11');
                    $spreadsheet->getActiveSheet()->mergeCells('U12:V12');
                    $spreadsheet->getActiveSheet()->mergeCells('U13:V13');
                    $spreadsheet->getActiveSheet()->mergeCells('U14:V14');
                    $spreadsheet->getActiveSheet()->mergeCells('U15:V15');
                    $spreadsheet->getActiveSheet()->mergeCells('U16:V16');
                    $spreadsheet->getActiveSheet()->mergeCells('U17:V17');
                    $spreadsheet->getActiveSheet()->mergeCells('U18:V18');
                    $spreadsheet->getActiveSheet()->mergeCells('U19:V19');
                    // merge info Down
                    $spreadsheet->getActiveSheet()->mergeCells('X'.($z+8).':Y'.($z+8));
                    $spreadsheet->getActiveSheet()->mergeCells('X'.($z+9).':Y'.($z+9));
                    $spreadsheet->getActiveSheet()->mergeCells('X'.($z+10).':Y'.($z+10));
                    $spreadsheet->getActiveSheet()->mergeCells('X'.($z+11).':Y'.($z+11));
                //TABEL INFO LABOR
                // Data LIST DOWNTIME
                    $y = $z+9;
                    foreach($down as $down) {
                        $all = ($down->durasi*60);
                        // menit
                        $menit = floor(($all%3600)/60);
                        // detik
                        $detik = floor((($all%3600)%60)/1);

                        $spreadsheet->setActiveSheetIndex($ix)  
                            ->setCellValue('O'.$y, $down->jam_ke)
                            ->setCellValue('P'.$y, $down->kode)
                            ->setCellValue('Q'.$y, $down->kodepasi)
                            ->setCellValue('R'.$y, $down->problem)
                            ->setCellValue('S'.$y, $down->keterangan)
                            ->setCellValue('U'.$y, $menit.' Menit '.$detik.' dtk')
                            ->setCellValue('V'.$y, $down->jenis); 
                        // set
                            $spreadsheet->getActiveSheet()->getStyle('P'.$y)->getAlignment()->setHorizontal('center');
                            $spreadsheet->getActiveSheet()->mergeCells('S'.($y).':T'.($y));    
                            $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(14); //Lebar Problem
                        $y++;  
                    }

                // null data
                    $spreadsheet->getActiveSheet()->mergeCells('S'.($y).':T'.($y));
                    $spreadsheet->getActiveSheet()->mergeCells('S'.($y+1).':T'.($y+1));
                    $spreadsheet->getActiveSheet()->mergeCells('S'.($y+2).':T'.($y+2));
                    $spreadsheet->getActiveSheet()->mergeCells('S'.($y+3).':T'.($y+3));

                // ISI BOTTOM
                    $spreadsheet->setActiveSheetIndex($ix)  
                            ->setCellValue('R'.($i+2), 'Total')
                            ->setCellValue('S'.($i+2), round($sum_totumh,2));
                // FORMATING
                    $spreadsheet->getActiveSheet()->getStyle('Q'.$z)->getFont()->setSize(18);
                    $spreadsheet->getActiveSheet()->getStyle('Q'.($z+8).':V'.($z+8))->getAlignment()->setHorizontal('center');
                    $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+2))->getAlignment()->setHorizontal('right');
                    $spreadsheet->getActiveSheet()->getStyle('Z'.($z+8).':Z'.($z+11))->getAlignment()->setHorizontal('right'); //info data right
                    $spreadsheet->getActiveSheet()->getStyle('W9:W19')->getAlignment()->setHorizontal('right'); 

                    $spreadsheet->getActiveSheet()->getStyle('O10:S'.($i+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                    $spreadsheet->getActiveSheet()->getStyle('O'.($z+8).':V'.($z+8))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                    $spreadsheet->getActiveSheet()->getStyle('O'.($z+9).':V'.($y+3))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//tbl main
                    $spreadsheet->getActiveSheet()->getStyle('X'.($z+8).':Z'.($z+11))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info 
                     
                    $spreadsheet->getActiveSheet()->getStyle('U9:W19')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info
            }else{//--> SIF B KOSONG
                // Check Status is Checked
                    $stat = 'No-Data';
                    $spreadsheet->getActiveSheet()->getStyle('P7')->applyFromArray($s_status_un);  
                // Data QCD
                    $spreadsheet->setActiveSheetIndex($ix) 
                        ->setCellValue('Q2', 'Daily Summary QCD')
                        ->setCellValue('O4', 'Tanggal')
                        ->setCellValue('O5', 'Line')
                        ->setCellValue('O6', 'Shift')
                        ->setCellValue('O7', 'Status')
                        //isi header
                        ->setCellValue('P4', $tgl_pos)
                        ->setCellValue('P5', $carl[$ix]->nama_line)
                        ->setCellValue('P6', 'B')
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

                    $spreadsheet->setActiveSheetIndex($ix) 
                        ->setCellValue('Q'.$z, 'Daily Downtime Summary')
                        ->setCellValue('O'.($z+3), 'Tanggal')
                        ->setCellValue('O'.($z+4), 'Line')
                        ->setCellValue('O'.($z+5), 'Shift')
                        ->setCellValue('O'.($z+6), 'Status')
                        //isi header
                        ->setCellValue('P'.($z+3), $tgl_pos)
                        ->setCellValue('P'.($z+4), $carl[$ix]->nama_line)
                        ->setCellValue('P'.($z+5), 'B')
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
                    $spreadsheet->setActiveSheetIndex($ix)  
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

                    $spreadsheet->getActiveSheet()->getStyle('U9:V14')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);//info
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
                $spreadsheet->getActiveSheet()->getStyle('A:ZZ')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
                $spreadsheet->getActiveSheet()->getStyle('A9:E9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                $spreadsheet->getActiveSheet()->getStyle('O9:S9')->getBorders()->getAllBorders()->applyFromArray($s_border_tabel);//tbl main
                 
                // END FOCUS
                $spreadsheet->getActiveSheet()->setSelectedCell('A1');
            //=============================   FINISHING  ======================================== 
            // Rename worksheet 
            $spreadsheet->getActiveSheet()->setTitle($carl[$ix]->nama_line.' |'.$carl[$ix]->nama_carline);
            // Endd 
        }   

        // End
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);
            
            $writer = new Xlsx($spreadsheet);  
            $filename = $tgl_pos.'-AllCarline-QCD.xlsx';
             
            // unlink('./assets/temp_file/'.$filename);// hapus file lama
            $writer->save('assets/temp_file/'.$filename); // will create and save the file in the root of the project
        echo base_url('assets/temp_file/'.$filename);  
    }

    
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */