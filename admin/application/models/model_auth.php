<?php

class model_auth extends CI_Model{
    
      public function login($username,$password){
        
        $this->db->select('id');
        $this->db->from('admin');
        $this->db->where('uname',$username);
        $this->db->where('pass',$password);
       $query= $this->db->get();
        if($query->num_rows()==1){
            return 1;
           
        }
        else{
            return 0;
        }
            
    }
}

