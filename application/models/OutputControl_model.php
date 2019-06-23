<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutputControl_model extends CI_Model {


	public function getOutputControl()
	{
		$this->db->select('*');
		$this->db->from('output_control');
		$this->db->order_by('jam_ke', 'asc');
        $query= $this->db->get();
       	return $query->result();
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


	//now is not used
	public function getCountBeforeBuild()
	{  
		$this->db->select('*');
        $this->db->from('build_assy');
        $this->db->where('id_outputcontrol',12);
        $this->db->order_by("time", "asc");
        $query=$this->db->get(); 
        $data = $query->first_row(); 

		$this->db->select('count(*) as o');
        $this->db->from('build_assy');
        $this->db->where('time <',$data->time); 
        $query=$this->db->get(); 
        $data1 = $query->first_row();
        
        return  $data1;
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