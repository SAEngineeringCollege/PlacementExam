<?php class dash extends CI_Controller{


    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');

    }



    public function index(){

      if($this->session->userdata('login')==TRUE)
      {
       $this->load->model('model_user');
       $data['department']='';
       $data['department_score']=$this->model_user->getDepartmentScore();
       $this->load->view('dash',$data);
      }
        else {

           redirect('login');
      }

    }

    public function questions(){
     $this->load->model('model_event');

     $data['department']='';
    $data['count']=$this->model_event->questionCount();
    $data['questions']=$this->model_event->questionList();
    $this->load->view('exam_questions',$data);
  }

  public function wipeQuestion($qid)
  {
  if($this->session->userdata('login')==TRUE)
  {
  $this->load->model('model_event');
  if($this->model_event->wipeQuestion($qid))
  {
  redirect('dash/questions');
  }


  }
  }



  	public function updateQuestion($id){

  		 $this->load->model('model_event');


  		$questionInfo=array(

  		'question'=>$this->input->post('question'),
  		'program'=>htmlentities($this->input->post('program')),
  		'op1'=>$this->input->post('op1'),
  		'op2'=>$this->input->post('op2'),
  		'op3'=>$this->input->post('op3'),
  		'op4'=>$this->input->post('op4'),
  		'ans'=>$this->input->post('ans'),
  		'pts'=>$this->input->post('pts'),
  		);

  		if($id=='new'){
  		if($this->model_event->questionUpdate('new',$questionInfo)){
  			return 1;
  	}
  	else{
  		if($this->model_event->questionUpdate($id))
  		{
  			return 1;
  	}

  	}

  	}

  }



public function wipeDelegate($uid)
{
    if($this->session->userdata('login')==TRUE)
      {
       $this->load->model('model_user');
if($this->model_user->wipeDelegate($uid))
{
redirect('dash');
}


}
}



}
