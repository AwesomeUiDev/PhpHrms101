<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {

     
    function insert_csv($data) {
        $this->db->insert('emp_attendance', $data);
    }

    public function find_weekend($date){
    	$day = date('l', strtotime($date));
    	$this->db->select('*');
        $this->db->from('weekly_holiday');
        $this->db->where("FIND_IN_SET('".$day."', dayname)");
        $query=$this->db->get();
        $data=$query->num_rows();
        return $data;
    }


	function find_leave($employee_id,$date){
		$query = $this->db->select("*")
		                 ->from('leave_apply')
		                 ->where('employee_id',$employee_id)
		                 ->where('leave_aprv_strt_date <=',$date)
		                 ->where('leave_aprv_end_date >=',$date)
		                 ->get();
						if($query->num_rows() > 0){
							return $query->num_rows();
						}else{
							return 0;
						}
	}
}

