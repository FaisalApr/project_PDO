<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary_model extends CI_Model {

	public function getTotalPlanActualPerShifLine($line,$shift,$date)
	{
		$query= $this->db->query("
						SELECT 
							main_pdo.tanggal,
							output_control.time,
							sum(output_control.actual)as actual,
							sum(output_control.plan)as plan 
						FROM output_control  
							JOIN main_pdo ON output_control.id_pdo=main_pdo.id   
						WHERE 
							main_pdo.id_shift=$shift AND 
							main_pdo.id_listcarline=$line AND
							YEAR(main_pdo.tanggal)=YEAR('$date') AND
						    MONTH(main_pdo.tanggal)=MONTH('$date')

						GROUP BY DAY(main_pdo.tanggal) 
						ORDER BY main_pdo.tanggal ASC
					"); 
        return $query->result();
	}

	public function hitungBalance($line,$date)
	{
		$query= $this->db->query("
						SELECT 
							main_pdo.tanggal, 
							sum(output_control.plan)as to_plan,
							sum(output_control.actual)as to_actual,  
							(
						      if( (sum(output_control.plan))<(sum(output_control.actual)),(sum(output_control.actual))-(sum(output_control.plan)),(sum(output_control.actual))-(sum(output_control.plan)))
							) as balance

						FROM output_control 
							JOIN main_pdo ON output_control.id_pdo=main_pdo.id
							JOIN list_carline ON main_pdo.id_listcarline=list_carline.id
							JOIN shift on main_pdo.id_shift=shift.id
						WHERE
							list_carline.id='$line' AND
							YEAR(output_control.time)=YEAR('$date') AND
							MONTH(output_control.time)=MONTH('$date')

						GROUP BY DAY(main_pdo.tanggal) 
						ORDER BY main_pdo.tanggal ASC
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

	public function getTopDeffectMonthly($date,$line)
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
								    MONTH(main_pdo.tanggal)= month('$date')AND
                                    main_pdo.id_listcarline=$line
								    
								GROUP BY quality_control.id_jenisdeffect
								ORDER BY top DESC
							");
		return $q->result();
	}

}

/* End of file summary_model.php */
/* Location: ./application/models/summary_model.php */