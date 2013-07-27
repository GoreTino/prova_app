<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller {

    public function index()
    {
    	$this->_head();

		$this->load->library('googlemaps');

		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';

		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$this->googlemaps->add_marker($marker);

		$data = array();
		$data['map'] = $this->googlemaps->create_map();

		// $this->load->view('view_file', $data);	
		print_r($data['map']['js']);
		
        $this->load->view('main', $data);

        $this->_footer();
    }
}
?>
