<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdo_model extends CI_Model {
 
 	public function getPdoAll() 
	{
		$this->db->select('*');
		$this->db->from('main_pdo');  
		$query=$this->db->get();

		return $query->result();
	}

	public function getDataBylin($dat,$ln,$sf)
	{   
		$query= $this->db->query("SELECT * 
									FROM main_pdo  
									WHERE 
										YEAR(tanggal)=YEAR('$dat') AND 
										MONTH(tanggal)=MONTH('$dat') AND 
									    main_pdo.id_listcarline='$ln' AND 
									    main_pdo.id_shift='$sf' 
									ORDER BY tanggal ASC"); 
        return $query->result();
        // return $sf; 
	}

	public function getDataByLineWaktuShift($lin,$tgl,$sf)
	{
		$query = $this->db->query("SELECT 
										COALESCE(main_pdo.dpm_fa,0) as dpm,main_pdo.id,tanggal 
									FROM main_pdo  
									WHERE 
										main_pdo.id_shift='$sf' AND 
									    main_pdo.id_listcarline=$lin  AND 
									    YEAR(tanggal)=YEAR('$tgl') AND 
									    MONTH(tanggal)=MONTH('$tgl') 
									ORDER BY tanggal ASC");
		return $query->result();
	}

	public function getDataByTanggalChange($date,$sif,$line)
	{
		$query = $this->db->query("SELECT *,main_pdo.id as id_pdo 
									FROM main_pdo  
										JOIN shift on main_pdo.id_shift=shift.id  
									WHERE 
										date(tanggal)=date('$date') AND 
									    main_pdo.id_listcarline=$line AND
									    main_pdo.id_shift=$sif");
		return $query->first_row();
	}

	public function pdoById($id_pdo) 
	{
		$this->db->select('*');
		$this->db->from('main_pdo');
		$this->db->where('id',$id_pdo);  
		$query=$this->db->get();

		return $query->first_row();
	}

	public function cariPdo($id_user,$shift,$tanggal) 
	{
		$this->db->select('*');
		$this->db->from('main_pdo');
		$this->db->where('id_users',$id_user);
		$this->db->where('id_shift',$shift); 
		$this->db->where('DATE(tanggal)', $tanggal ); 
		$query=$this->db->get();

		if ($query->num_rows()>=1) {
			return true;
		}else{
			return false;
		}
	}
	

	public function cariPdoItems($id_line,$shift,$tanggal)
	{
		$this->db->select('*');
		$this->db->from('main_pdo');
		$this->db->where('id_listcarline',$id_line);
		$this->db->where('id_shift',$shift); 
		$this->db->where('DATE(tanggal)', $tanggal );
		$this->db->order_by('tanggal',"desc");
		$query=$this->db->get();

		return $query->first_row();
	}

	public function cariHariIni($id_line,$shift,$tanggal)
	{
		$this->db->select('*');
		$this->db->from('main_pdo');
		$this->db->where('id_listcarline',$id_line);
		$this->db->where('id_shift',$shift); 
		$this->db->where('DATE(tanggal)',$tanggal ); 
		$query=$this->db->get();

		if ($query->num_rows()>=1) {
			return $query->first_row();
		}else{
			return false;
		} 
	}

	public function createPdo($data)
	{
		return $this->db->insert('main_pdo', $data);
	}

	public function createPdoHistory($data)
	{
		return $this->db->insert('history_pdo', $data);
	}

	public function updateSpeedPdo()
	{
		//data new
		$dataUpdatePdo = array( 
			'line_speed' => $this->input->post('spd')
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('main_pdo',$dataUpdatePdo);
	}

	public function updatePdo($data,$id)
	{ 
		$this->db->where('id',$id);
		return $this->db->update('main_pdo',$data);
	}
 	
 	public function lossOutput($id)
 	{
 		$q = $this->db->query('SELECT (SELECT COALESCE(SUM(plan),0) FROM output_control WHERE id_pdo='.$id.')-(SELECT COALESCE(SUM(actual),0) FROM output_control WHERE id_pdo='.$id.') as los_output');

		return $q->first_row();
 	}

 	// total Act mH OUT
 	public function getActMhOut($pdo)
 	{
		$q = $this->db->query('SELECT sum(build_assy.actual*assembly.umh) as acttot_mh_out FROM build_assy JOIN assembly on build_assy.id_assy=assembly.id WHERE build_assy.id_pdo='.$pdo); 		
		return $q->first_row();
 	}

 	public function refreshData($id)
 	{
 		$id_pdo = $id;

 		$mh_out = $this->Pdo_model->getActMhOut($id_pdo)->acttot_mh_out;

 			$mhin = $this->OutputControl_model->getMHin_dl($id_pdo);
 		$mh_in_dl = $mhin->mhin_dl; 
 			$mhin_idl = $this->OutputControl_model->getMHin_idl($id_pdo);
 		$mh_in_idl = $mhin_idl->mh_in_idl; 
 		// direct eff
 		$eff = (((double)$mh_out)/$mhin->mhin_dl)*100;
 		$productiv = (((double)$mh_out)/($mhin->mhin_dl+$mhin_idl->mh_in_idl))*100;
 		// loss output
 		$loss = $this->Pdo_model->lossOutput($id_pdo)->los_output;
 		if ($loss<0) {
 			$loss = 0; 
 		} 
 		$loss_out = $loss; 
 		$jam_eff =  $this->Losstime_model->getLosstimeWidget($id_pdo)->jam_iff;
 		$p_loss =  $this->Losstime_model->getLosstimeWidget($id_pdo)->losspercent;
 		$dpm = $this->Defect_model->getDPM($id_pdo)->dpm;

 		// data new PDO
		$dataPdo = array( 
			'mh_out' => $mh_out,
			'mh_in_dl' => $mh_in_dl,
			'mh_in_idl' => $mh_in_idl,
			'direct_eff' => $eff,
			'total_productiv' => $productiv,
			'loss_output' => $loss_out,
			'p_loss_time' => $p_loss,
			'jam_effective' => $jam_eff,
			'dpm_fa' => $dpm
		);

		$result = $this->Pdo_model->updatePdo($dataPdo,$id_pdo); 
		return $result;
 	}


}

/* End of file pdo_model.php */
/* Location: ./application/models/pdo_model.php */