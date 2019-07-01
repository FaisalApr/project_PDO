<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdo_model extends CI_Model {

	// function __construct(){
	// 	parent::__construct();
	// 	$this->load->model('Pdo_model');
	// 	$this->load->model('OutputControl_model');
	// 	$this->load->model('DirectLabor_Model');
	// 	$this->load->model('Losstime_model');
	// 	$this->load->model('Defect_model');
	// }

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
	

	public function cariPdoItems($id_user,$shift,$tanggal)
	{
		$this->db->select('*');
		$this->db->from('main_pdo');
		$this->db->where('id_users',$id_user);
		$this->db->where('id_shift',$shift); 
		$this->db->where('DATE(tanggal)', $tanggal );
		$this->db->order_by('tanggal',"desc");
		$query=$this->db->get();

		return $query->first_row();
	}

	public function createPdo($data)
	{
		return $this->db->insert('main_pdo', $data);
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
			'dpm_fa' => $dpm,
			'status' => 1 
		);

		$result = $this->Pdo_model->updatePdo($dataPdo,$id_pdo); 
		return $result;
 	}


}

/* End of file pdo_model.php */
/* Location: ./application/models/pdo_model.php */