<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends MY_Controller {
	
    function __construct()
    {
        parent::__construct();
	}

	function login(){
    	$this->load->config('tutorials');

        $this->load->view('head');
        $this->load->view('login', array('returnURL'=>$this->input->get('returnURL')));
        $this->load->view('footer');

        $this->_footer();
    }

	function logout(){
    	$this->session->sess_destroy();
    	$this->load->helper('url');
    	redirect('/');
    }

    function register(){
        $this->_head();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
        $this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');

        if($this->form_validation->run() === false){
            $this->load->view('register');    
        } else {
            if(!function_exists('password_hash')){
                $this->load->helper('password');
            }
            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $this->load->model('user_model');
            $this->user_model->add(array(
                'email'=>$this->input->post('email'),
                'password'=>$hash,
                'nickname'=>$this->input->post('nickname')
            ));

            $this->session->set_flashdata('message', '회원가입에 성공했습니다.');
            $this->load->helper('url');
            redirect('/');
        }

        $this->_footer();   
    }

    function authentification()
    {
    	$authentificiation = $this->config->item('authentification');

    	if (
    		$this->input->post('id') == $authentification['id'] &&
    		$this->input->post('password') == $authentification['password']
    	) {
    		$this->session->set_userdata('is_login', true);
    		$this->load->helper('url');
    		
            $returnURL = $this->input->get('returnURL');
            log_message('info', $returnURL);
            redirect($returnURL ? $returnURL : '/');

    	} else {
    		echo "Unmatched";
    		$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
    		$this->load->helper('url');
    		redirect('/auth/login');
    	}

    }

    function confirmation_email($user_email)
    {
        $this->load->library('email');
        // 전송할 데이터가 html 문서임을 옵션으로 설정
        $this->email->initialize(array('mailtype'=>'html'));
        $this->load->helper('url');
      
       // 송신자의 이메일과 이름 정보
        $this->email->from('master@ooo2.org', 'master');            
        // 이메이 제목
        $this->email->subject('글을 발행 됐습니다.');
        // 이메일 본문
        //$this->email->message('<a href="'.site_url().'index.php/topic/get/'.$topic_id.'">'.$this->input->post('title').'</a>');
        // 이메일 수신자.
        $this->email->to($user_email);
        // 이메일 발송
        $this->email->send();
    
}