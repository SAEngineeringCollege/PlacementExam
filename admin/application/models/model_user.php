<?php

class model_user extends CI_Model{

  public function wipeDelegate($uid){

       $query=$this->db->query("Delete FROM exam_attendee where id='$uid'");

  if($query){

           return 1;
        }
        else{
            return 0;
        }
}


     public function getExamAttendees($department){
       $query=$this->db->query("Select * from exam_attendee where department='$department'");
            return $query->result();
    }

    public function getStudentsCount($year,$department){
      $query=$this->db->query("Select * from exam_attendee where department='$department' and year='$year'");
           return $query->num_rows();
    }
    public function getDepartmentScore(){
      $query=$this->db->query("Select department, COUNT(*) as cnt  from exam_attendee as u GROUP BY department");
           return $query->result_array();
    }
}
