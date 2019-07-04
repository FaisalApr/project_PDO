<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputControl_model extends CI_Model {


	public function getOutputControl()
	{
		$this->db->select('*');
		$this->db->from('output_control');
		$this->db->where('id_pdo',$this->input->post('id_pdo'));
		$this->db->order_by('jam_ke', 'asc');
        $query= $this->db->get();
       	return $query->result();
	}

	public function hapus_buildAssyAll($id,$pdo)
	{
		$this->db->where('id_assy',$id);
		$this->db->where('id_pdo',$pdo);
		$result = $this->db->delete('build_assy');
		return $result;
	}

	public function updateAssyAll()
	{    
		$data = array( 
			'id_assy' => $this->input->post('id_new')
		);

		$this->db->where('id_pdo', $this->input->post('id_pdo'));
		$this->db->where('id_assy', $this->input->post('id_old'));
		return $this->db->update('build_assy',$data);
	}
	
	public function getBuildAssy($id)
	{
		$query= $this->db->query("SELECT build_assy.id,build_assy.id_assy,build_assy.actual FROM `build_assy` JOIN assembly ON build_assy.id_assy=assembly.id WHERE build_assy.id_outputcontrol=$id ORDER BY time asc");
        return $query->result();
	}

	public function getBuildAssyHead($id)
	{
		$query= $this->db->query("SELECT * FROM `build_assy` JOIN assembly ON build_assy.id_assy=assembly.id WHERE build_assy.id_pdo=$id group by build_assy.id_assy ORDER BY time asc");
        return $query->result();
	}

	public function getMHin()
	{
		$pdo = $this->input->post('id_pdo');
		$query= $this->db->query("SELECT ((SELECT (SELECT COALESCE(SUM(total),0) FROM regulasi WHERE id_jenisreg=1 AND id_pdo=$pdo)+(SELECT COALESCE(SUM(total),0) FROM direct_labor WHERE id_pdo=$pdo))-(SELECT COALESCE(SUM(total),0) FROM absen_pegawai WHERE id_pdo=$pdo)-(SELECT COALESCE(SUM(total),0) FROM indirect_activity WHERE id_pdo=$pdo)-(SELECT COALESCE(SUM(total),0) FROM regulasi WHERE id_jenisreg=2 AND id_pdo=$pdo))as mhin ");
        return $query->first_row();
	}

	public function getMHin_dl($pdo)
	{ 
		$query= $this->db->query("SELECT ((SELECT (SELECT COALESCE(SUM(total),0) FROM regulasi WHERE id_jenisreg=1 AND id_pdo=$pdo)+(SELECT COALESCE(SUM(total),0) FROM direct_labor WHERE id_pdo=$pdo))-(SELECT COALESCE(SUM(total),0) FROM absen_pegawai WHERE id_pdo=$pdo)-(SELECT COALESCE(SUM(total),0) FROM indirect_activity WHERE id_pdo=$pdo)-(SELECT COALESCE(SUM(total),0) FROM regulasi WHERE id_jenisreg=2 AND id_pdo=$pdo))as mhin_dl");
        return $query->first_row();
	}

	public function getMHin_idl($pdo)
	{ 
		$query= $this->db->query("SELECT (SELECT COALESCE(SUM(total),0) FROM `indirect_labor` WHERE id_pdo=$pdo)-(SELECT COALESCE(SUM(total),0) FROM `absen_leader` WHERE id_pdo=$pdo) as mh_in_idl");
        return $query->first_row();
	}

	public function getMHintot()
	{
		$pdo = $this->input->post('id_pdo');
		$query= $this->db->query("SELECT (SELECT ((SELECT (SELECT COALESCE(SUM(total),0) FROM regulasi WHERE id_jenisreg=1 AND id_pdo=$pdo)+(SELECT COALESCE(SUM(total),0) FROM direct_labor WHERE id_pdo=$pdo))-(SELECT COALESCE(SUM(total),0) FROM absen_pegawai WHERE id_pdo=$pdo)-(SELECT COALESCE(SUM(total),0) FROM indirect_activity WHERE id_pdo=$pdo)-(SELECT COALESCE(SUM(total),0) FROM regulasi WHERE id_jenisreg=2 AND id_pdo=$pdo)))+(SELECT (SELECT COALESCE(SUM(total),0) FROM `indirect_labor` WHERE id_pdo=$pdo)+(SELECT COALESCE(SUM(total),0) FROM `absen_leader` WHERE id_pdo=$pdo)) as mhin_dlidl");
        return $query->first_row();
	}

	public function getMP()
	{
		$pdo = $this->input->post('id_pdo');
		$query= $this->db->query("SELECT reg_dl FROM direct_labor WHERE id_pdo=$pdo");
        return $query->first_row();
	}


	public function createBuildAssy()
	{
		date_default_timezone_set("Asia/Jakarta");

		//data new
		$dataBuildAssy = array(
			'id_outputcontrol' => $this->input->post('id_oc'),
			'id_pdo' => $this->input->post('pdo'),
			'id_assy' => $this->input->post('id_assy'),
			'actual' => 0,
			'time' => date("Y-m-d H:i:s")
		);
		return $this->db->insert('build_assy',$dataBuildAssy);
	}

	public function updateBuildAssy()
	{  
		//data new
		$dataupdateBuildAssy = array( 
			'actual' => $this->input->post('act')
		);
		$this->db->where('id', $this->input->post('id_a'));
		return $this->db->update('build_assy',$dataupdateBuildAssy);
	}


	public function createOutputControl()
	{ 
		date_default_timezone_set("Asia/Jakarta");

		//data new
		$dataOC = array(
			'id_pdo' => $this->input->post('id_pdo'),
			'plan' => $this->input->post('plan'),
			'actual' => 0,
			'jam_ke' => $this->input->post('jam_ke'),
			'time' => date("Y-m-d H:i:s")
		);
		return $this->db->insert('output_control',$dataOC);
	}
 

	public function updatePlanOC()
	{
		//data new
		$dataUpdatePdo = array( 
			'plan' => $this->input->post('plan')
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('output_control',$dataUpdatePdo);
	}


}

/* End of file outputControl_model.php */
/* Location: ./application/models/outputControl_model.php */