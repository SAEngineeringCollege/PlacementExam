<?php class code extends CI_Controller{


    function __construct() {
        parent::__construct();
      $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
                if($this->session->userdata('login')==FALSE)
      {
		  redirect('dash');
	  }
    }

    public function wipeQuestion($qid)
{
if($this->session->userdata('login')==TRUE)
{
$this->load->model('model_event');
if($this->model_event->wipeQuestion('code',$qid))
{
redirect('code/questions');
}


}
}

    public function index(){
      $this->load->model('model_event');

		$data['event']="code";
    $data['count']=$this->model_event->participantsCount('code');
   $data['registrations']=$this->model_event->participantsList('code');
		$this->load->view('event_home',$data);
	}

    public function participants(){
		 $this->load->model('model_event');

		$data['event']="code";
		$data['count']=$this->model_event->participantsCount('code');
		$data['participants']=$this->model_event->participantsList('code');
		$this->load->view('event_participants',$data);
	}

	  public function questions(){
		 $this->load->model('model_event');

		$data['event']="code";
		$data['count']=$this->model_event->questionCount('code');
		$data['participants']=$this->model_event->questionList('code');
		$this->load->view('event_questions',$data);
	}

	public function updateQuestion($id){

		 $this->load->model('model_event');


		$questionInfo=array(

		'question'=>$this->input->post('question'),
    'program'=>htmlentities($this->input->post('program')),
						'image'=>($this->input->post('image')),
		'op1'=>$this->input->post('op1'),
		'op2'=>$this->input->post('op2'),
		'op3'=>$this->input->post('op3'),
		'op4'=>$this->input->post('op4'),
		'ans'=>$this->input->post('ans'),
		'pts'=>$this->input->post('pts'),
		);

		if($id=='new'){
		if($this->model_event->questionUpdate('code','new',$questionInfo)){
			return 1;
	}
	else{
		if($this->model_event->questionUpdate('code',$id))
		{
			return 1;
	}

	}

	}

}



}
