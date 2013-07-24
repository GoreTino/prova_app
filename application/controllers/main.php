<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller {

    public function index()
    {
    	$this->_head();

        $this->load->view('head');
        $this->load->view('main');
        $this->load->view('footer');

        $this->_footer();
    }
}
?>
