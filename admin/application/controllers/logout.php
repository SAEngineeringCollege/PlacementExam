<?php class logout extends CI_Controller{

public function index()
{
 
            $this->session->unset_userdata('login');
            redirect('dash');
}

}
?>