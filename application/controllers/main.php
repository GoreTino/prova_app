<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller {

	function __construct()
	{
		parent::__construct();
     	
     	$this->load->model('map_cache');
     }

    public function index()
    {
    	$this->_head();
    	$this->load->view('navigation_panel');

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
		        
		$search_panel = $this->load->view('search_panel', '', TRUE);

		$params = array('map' => $data['map'],				
						'custom_panel' => $search_panel);

		$this->load->view('main', $params);

        $this->_footer();
    }

    function search_location()
    {
    	$this->_head();
		$this->load->view('navigation_panel');

		$location = $this->input->post('placeText');

		$this->load->library('googlemaps');

		$config = array();

		$config['center'] = $location;
		$config['zoom'] = '13';
		$config['places'] = TRUE;
		$config['geocodeCaching'] = TRUE;

		$config['placesAutocompleteInputID'] = 'placeText';
		$config['placesAutocompleteBoundsMap'] = TRUE;

		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $location;
		$marker['infowindow_content'] = '1 - Hello World!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';

		$this->googlemaps->add_marker($marker);

		$data['map'] = $this->googlemaps->create_map();

		print_r($data['map']['js']);

		$map_cache = $this->map_cache->get_map_cache();

		$search_panel = $this->load->view('search_panel', array('map_cache'=>$map_cache), TRUE);

		$params = array('map' => $data['map'],
						'custom_panel' => $search_panel);

		$this->load->view('main', $params);

        $this->_footer();

	}

	function select_location()
    {
    	$this->_head();
		$this->load->view('navigation_panel');

    	$location = $this->input->post('location');			
		
		$this->load->library('googlemaps');
    	
		$config = array();

		$config['center'] = $location['address'];
		$config['zoom'] = '13';
		$config['places'] = TRUE;
		$config['geocodeCaching'] = TRUE;

		$config['placesAutocompleteInputID'] = 'placeText';
		$config['placesAutocompleteBoundsMap'] = TRUE;

		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] =$location['address'];
		$marker['infowindow_content'] = '1 - Hello World!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';

		$this->googlemaps->add_marker($marker);

		$data['map'] = $this->googlemaps->create_map();

		print_r($data['map']['js']);

		$map_cache = $this->map_cache->get_map_cache();

		$search_panel = $this->load->view('search_panel', array('map_cache'=>$map_cache), TRUE);

		$params = array('map' => $data['map'],
						'custom_panel' => $search_panel);

		$this->load->view('main', $params);		
       
		$this->load->view('results_panel', array('selected_location'=>$location));

    	$this->_footer();
    }

	function place_memo()
    {
    	$location = $this->input->post('placeText');
    }    
}
?>
