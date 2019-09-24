<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectLabor_Model extends CI_Model {
 
	public function createDL($data)
	{ 
		return $this->db->insert('direct_labor', $data);
	}

	public function updateDL($data,$id)
	{ 
		$this->db->where('id_pdo',$id);
		return $this->db->update('direct_labor', $data);
	}
// Indirect Activity
	public function arrayInsertDirectActivity($new)
	{ 
		$result = $this->db->insert('indirect_activity',$new);

		return $result;
	}

	public function getDataIndirectPerPdo($pdo)
	{
		$res = $this->db->query("SELECT * FROM indirect_activity WHERE id_pdo=$pdo");
		return $res->result();
	}

	public function updateActivity($data,$id)
	{
		$this->db->where('id',$id);

		return $this->db->update('indirect_activity', $data);
	}

	public function deleteActivity($id)
	{ 
		$this->db->where('id',$id);
		$result = $this->db->delete('indirect_activity');
		return $result;
	}

// absen pegawai
	public function createAbsenPegawai($data)
	{
		# code...
		return $this->db->insert('absen_pegawai', $data);
	}

	public function getAbsenPegawai()
	{
		# code...
		$id_pdo = $this->input->post('id_pdo');
		// urut abjad
		$this->db->order_by('item','asc');
		// get data
		$query = $this->db->get_where('absen_pegawai' , array('id_pdo' => $id_pdo));
		return $query->result();
	}

	public function delAbsenPegawai($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('absen_pegawai');
		return $result;
	}

	public function updateAbsenPegawai($id,$item,$qty,$jam,$total)
	{
		# code...
		$data = array(
			'item' => $item,
			'qty' => $qty,
			'jam' => $jam,
			'total' => $total
		);
		$this->db->where('id',$id);
		$result = $this->db->update('absen_pegawai', $data);
	}

// regulasi in

	// get dropdown record
	public function getRecordById($id)
	{
		# code...
		$query = $this->db->get_where('output_control', array('id_pdo' => $id));
    	return $query->result();
	}

	//create
	public function createRegIn($data)
	{
		# code...
		return $this->db->insert('regulasi', $data);
	}

	// read
	public function getRegIn($id)
	{
		# code...
		// urut abjad
			$q = $this->db->query('SELECT id_oc, regulasi.id, output_control.jam_ke, regulasi.posisi, regulasi.qty, regulasi.jam, regulasi.total  from regulasi join output_control on output_control.id=regulasi.id_oc join jenis_regulasi on jenis_regulasi.id=regulasi.id_jenisreg where regulasi.id_pdo='.$id.' AND regulasi.id_jenisreg=1 ORDER BY output_control.jam_ke ASC');

			return $q->result();
	}

	// delete
	public function delRegIn($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('regulasi');
		return $result;
	}

	// update
	public function updateRegIn($id,$id_jenisreg,$id_oc,$posisi,$qty,$jam,$total)
	{
		# code...
		$data = array(
			'id_jenisreg' => $id_jenisreg,
			'id_oc' => $id_oc,
			'posisi' => $posisi,
			'qty' => $qty,
			'jam' => $jam,
			'total' => $total
		);
		$this->db->where('id',$id);
		$result = $this->db->update('regulasi', $data);
	}

// regulasi out

	//create
	public function createRegOut($data)
	{
		# code...
		return $this->db->insert('regulasi', $data);
	}

	// read
	public function getRegOut($id)
	{
		# code...
		// urut abjad
			$q = $this->db->query('SELECT output_control.id as idoc,regulasi.id, output_control.jam_ke, regulasi.posisi, regulasi.qty, regulasi.jam, regulasi.total  from regulasi join output_control on output_control.id=regulasi.id_oc join jenis_regulasi on jenis_regulasi.id=regulasi.id_jenisreg where regulasi.id_pdo='.$id.' AND regulasi.id_jenisreg=2 ORDER BY output_control.jam_ke ASC');

			return $q->result();
	}

	// delete
	public function delRegOut($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('regulasi');
		return $result;
	}

	// update
	public function updateRegOut($id,$id_jenisreg,$id_oc,$posisi,$qty,$jam,$total)
	{
		# code...
		$data = array(
			'id_jenisreg' => $id_jenisreg,
			'id_oc' => $id_oc,
			'posisi' => $posisi,
			'qty' => $qty,
			'jam' => $jam,
			'total' => $total
		);
		$this->db->where('id',$id);
		$result = $this->db->update('regulasi', $data);
	}


// get Direct Labor
	public function getDl($id)
	{ 
		$query = $this->db->get_where('direct_labor', array('id_pdo' => $id));
    	return $query->first_row();
	}

	public function getDlPdo($id)
	{ 
		$query = $this->db->get_where('direct_labor', array('id_pdo' => $id));
    	return $query->first_row();
	}


// For PDO EXPORT
	public function getindrectactiv($pdo)
	{
		$res = $this->db->query(" SELECT COALESCE(SUM(total),0) as tot FROM `indirect_activity` WHERE id_pdo=$pdo ");
		return $res->first_row();
	}

	public function getnonoprthours($pdo)
	{
		$res = $this->db->query(" SELECT COALESCE(SUM(total),0) as tot FROM `absen_pegawai` WHERE id_pdo=$pdo ");
		return $res->first_row();
	}

	public function getDataDirectLab($pdo)
	{
		$res = $this->db->query(" SELECT * FROM `direct_labor` WHERE id_pdo=$pdo ");
		return $res->first_row();
	}

	public function getRegulasiIn($pdo)
	{
		$res = $this->db->query(" SELECT COALESCE(SUM(total),0) as tot FROM `regulasi` WHERE id_jenisreg=1 AND id_pdo=$pdo ");
		return $res->first_row();
	}

	public function getRegulasiOut($pdo)
	{
		$res = $this->db->query(" SELECT COALESCE(SUM(total),0) as tot FROM `regulasi` WHERE id_jenisreg=2 AND id_pdo=$pdo ");
		return $res->first_row();
	}

} 