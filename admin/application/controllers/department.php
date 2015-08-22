<?php
class department extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('login') == FALSE) {
            redirect('dash');
        }
    }

    public function wipeQuestion($qid)
    {
        if ($this->session->userdata('login') == TRUE) {
            $this->load->model('model_event');
            if ($this->model_event->wipeQuestion('debug', $qid)) {
                redirect('debug/questions');
            }


        }
    }

    public function index($department)
    {
        $this->load->model('model_user');

        $data['department']         = $department;
        // $data['count']         = $this->model_user->getCount($department);
        $data['attendees'] = $this->model_user->getExamAttendees($department);
        $data['second_year_count'] = $this->model_user->getStudentsCount(2,$department);
        $data['third_year_count'] = $this->model_user->getStudentsCount(3,$department);
        $data['fourth_year_count'] = $this->model_user->getStudentsCount(4,$department);

        $this->load->view('department_home', $data);
    }

    public function students($department)
    {
        $this->load->model('model_user');

        $data['department']        = $department;
        $data['attendees'] = $this->model_user->getExamAttendees($department);
        $this->load->view('department_students', $data);
    }


    public function updateQuestion($id)
    {

        $this->load->model('model_event');


        $questionInfo = array(

            'question' => $this->input->post('question'),
            'program' => htmlentities($this->input->post('program')),
            'op1' => $this->input->post('op1'),
            'op2' => $this->input->post('op2'),
            'op3' => $this->input->post('op3'),
            'op4' => $this->input->post('op4'),
            'ans' => $this->input->post('ans'),
            'pts' => $this->input->post('pts')
        );

        if ($id == 'new') {
            if ($this->model_event->questionUpdate('debug', 'new', $questionInfo)) {
                return 1;
            } else {
                if ($this->model_event->questionUpdate('debug', $id)) {
                    return 1;
                }

            }

        }

    }



}
