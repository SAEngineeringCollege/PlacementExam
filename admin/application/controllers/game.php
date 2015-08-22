<?php class game extends CI_Controller{


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



    public function index(){
		 $this->load->model('model_user');

		$data['event']="game";
		$data['count']=$this->model_user->getCount('game');
		$data['registrations']=$this->model_user->getEventReg('game');

		$this->load->view('event_home',$data);
	}

    public function participants(){
		$this->load->model('model_event');
		$data['event']="game";
		$data['count']=$this->model_event->participantsCount('game');
		$data['participants']=$this->model_event->participantsList('game');
		$this->load->view('event_participants',$data);
	}

	  public function questions(){
		 $this->load->model('model_event');

		$data['event']="game";
		$data['count']=$this->model_event->questionCount('game');
		$data['participants']=$this->model_event->questionList('game');
		$this->load->view('event_questions',$data);
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
		if($this->model_event->questionUpdate('game','new',$questionInfo)){
			return 1;
	}
	else{
		if($this->model_event->questionUpdate('game',$id))
		{
			return 1;
	}

	}

	}

}



}
