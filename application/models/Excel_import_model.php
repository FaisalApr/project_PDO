<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import_model extends CI_Model {

	public function select()
	{
		# code...
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('assembly');
		return $query;
	}
	public function insert($data)
	{
		# code...
		$this->db->insert_batch('assembly', $data);

	}
	

	public function ceknama($kode)
	{ 
		# code...
		$query = $this->db->query('SELECT * FROM assembly where kode_assy="'.$kode.'"');
		if($query->num_rows()>0){
			return $query->first_row();
		}else{
			return false;
		}
	}

	public function cekerrorcode($kode)
	{ 
		# code...
		$query = $this->db->query('SELECT * FROM jenis_error where kode="'.$kode.'"');
		if($query->num_rows()>0){
			return $query->first_row();
		}else{
			return false;
		}
	}

	public function cekline($nama)
	{
		# code...
		$query = $this->db->query('"'.$nama.'"');
		return $query->first_row();
	}

	//  IMPORT
		public function cekComp($nama)
		{ 
			# code...
			$query = $this->db->query('SELECT * FROM district where nama="'.$nama.'"');
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}

		public function cekNamaCarline($nama,$id)
		{ 
			# code...
			$query = $this->db->query("SELECT * FROM carline WHERE id_district='".$id."' AND nama_carline='".$nama."'");
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}

		public function cekNamaLine($nama)
		{ 
			# code...
			$query = $this->db->query('SELECT * FROM line where nama_line="'.$nama.'"');
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}

		// mencari di list carline id carline n Line
		public function cekListCarlineOnCrnLn($cl,$ln)
		{ 
			# code...
			$query = $this->db->query("SELECT * FROM list_carline WHERE id_carline=$cl AND id_line=$ln");
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}		

		public function cekLineManager($lstcr,$assy)
		{  
			$query = $this->db->query("SELECT * FROM line_manager WHERE id_list_carline=$lstcr AND id_assy=$assy");
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}


}

/* End of file excel_import_model.php */
/* Location: ./application/models/excel_import_model.php */