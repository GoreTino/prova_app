<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller {

    public function index()
    {
    	$this->_head();

		$this->load->library('googlemaps');

		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['places'] = TRUE;

		$config['placesAutocompleteInputID'] = 'placeText';
		$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
		//$config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';

		$this->googlemaps->initialize($config);

		//$marker = array();
		//$marker['position'] = '37.429, -122.1419';

		//$this->googlemaps->add_marker($marker);

		//$data = array();
		$data['map'] = $this->googlemaps->create_map();

		print_r($data['map']['js']);
		
        $this->load->view('main', $data);
        $this->load->view('search_panel');

        $this->_footer();
    }

    function search_location()
    {
    	$this->_head();

		$location = $this->input->post('placeText');

		$this->load->library('googlemaps');

		$config = array();

		$config['center'] = $location;
		$config['zoom'] = 'auto';
		$config['places'] = TRUE;

		$marker = array();
		$marker['center'] = $location;

		$this->googlemaps->add_marker($marker);

		$this->googlemaps->initialize($config);

		$data['map'] = $this->googlemaps->create_map();

		print_r($data['map']['js']);

      	$this->load->view('main', $data);

      	$locations['current'] = $location;
		
		//$this->load->view('search_panel', array('topics'=>$topics));
		$this->load->view('search_panel', $locations);

        $this->_footer();

	}
}
?>
