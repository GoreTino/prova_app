<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
	}

	function login()
    {
    	$this->load->config('tutorials');

        $this->load->view('head');
        $this->load->view('login');
        $this->load->view('footer');

        $this->_footer();
    }

	function logout()
    {
    	$this->session->sess_destroy();
    	$this->load->helper('url');
    	redirect('/');
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
    		redirect("main/add");
    	} else {
    		ecth "Unmatched"
    		$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
    		$this->load->helper('url');
    		redirect('/auth/login');
    	}

    }
}