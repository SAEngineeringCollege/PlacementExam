<?php 

class login extends CI_Controller{
	
	 function __construct() {
        parent::__construct();
        
        if($this->session->userdata('login')==TRUE)
      {
		 redirect('dash');
	  }
        
	}
	
	public function index(){
        $this->load->view('login');
    }

        public function check() {
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required|callback_VerifyUser');

        if ($this->form_validation->run() == false) {
        $this->load->view('login');

        }
        else {
       
            redirect('dash');
        }
    }

    public function VerifyUser() {
        $username = $this->input->post('uname');
        $password = $this->input->post('pass');
       
        $this->load->model('model_auth');
        if ($this->model_auth->login($username, $password)) {
            
            $this->session->set_userdata('login',TRUE);
              
            return true;
            
        } else {
            $this->form_validation->set_message('VerifyUser', 'Incorrect Combination');
            return false;
        }
    }
   

	
}

?>
