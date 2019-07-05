<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary_model extends CI_Model {

	public function getTotalPlanActualPerShifLine($line,$shift,$date)
	{
		$query= $this->db->query("
						SELECT 
							output_control.time,
							sum(output_control.actual)as actual,
							sum(output_control.plan)as plan 
						FROM output_control  
							JOIN main_pdo ON output_control.id_pdo=main_pdo.id 
							JOIN line ON main_pdo.id_line=line.id 
							JOIN shift on main_pdo.id_shift=shift.id 
						WHERE 
							shift.keterangan='$shift' AND 
							line.id=$line AND
							YEAR(output_control.time)=YEAR('$date') AND
						    MONTH(output_control.time)=MONTH('$date')

						GROUP BY DAY(output_control.time) 
						ORDER BY output_control.time ASC
					"); 
        return $query->result();
	}

	public function hitungBalance($line,$date)
	{
		$query= $this->db->query("
						SELECT 
							output_control.time,
							sum(output_control.plan)as to_plan,
							sum(output_control.actual)as to_actual,  
						    (
						      if( (sum(output_control.plan))<(sum(output_control.actual)),(sum(output_control.actual))-(sum(output_control.plan)), (sum(output_control.actual))-(sum(output_control.plan))  )
						    ) as balance
						    
						FROM output_control 
							JOIN main_pdo ON output_control.id_pdo=main_pdo.id
						    JOIN line ON main_pdo.id_line=line.id
						    JOIN shift on main_pdo.id_shift=shift.id
						WHERE
						    line.id=$line AND
						    YEAR(output_control.time)=YEAR('$date') AND
						    MONTH(output_control.time)=MONTH('$date')
						    
						GROUP BY DAY(output_control.time) 
						ORDER BY output_control.time ASC
				");
        return $query->result();
	}


	public function getQualityByIdPdo($id)
	{
		$q = $this->db->query("SELECT 
									*, 
								    sum(quality_control.total) as total,
									(SELECT COALESCE(SUM(total),0) FROM quality_control WHERE id_pdo=$id) AS tot_this

								FROM quality_control 
								LEFT JOIN jenis_deffect on quality_control.id_jenisdeffect=jenis_deffect.id

								WHERE id_pdo=$id
								GROUP BY quality_control.id_jenisdeffect
							");
		
		return $q->result();
	}

	public function getTopDeffectMonthly($date)
	{
		$q = $this->db->query("SELECT  
								    quality_control.id_jenisdeffect,
								    jenis_deffect.keterangan,
								    sum(quality_control.total) as top
								    
								FROM quality_control 

								LEFT JOIN main_pdo on quality_control.id_pdo=main_pdo.id
								JOIN jenis_deffect ON quality_control.id_jenisdeffect=jenis_deffect.id
								WHERE
									YEAR(main_pdo.tanggal)= YEAR('$date') AND
								    MONTH(main_pdo.tanggal)= month('$date')
								    
								GROUP BY quality_control.id_jenisdeffect
								ORDER BY top DESC
							");
		return $q->result();
	}

}

/* End of file summary_model.php */
/* Location: ./application/models/summary_model.php */