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

		//$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';

		$data = $this->map_config($config, array());

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

		$config = array();

		$config['center'] = $location;
		$config['zoom'] = '13';

		$marker = array();
		$marker['place'] = $location;
		$marker['message'] = '1 - Hello World!';

		$data = $this->map_config($config, $marker);

		print_r($data['map']['js']);

		$map_cache = $this->map_cache->get_map_cache();

		$search_panel = $this->load->view('search_panel', array('map_cache'=>$map_cache), TRUE);

		$params = array('map' => $data['map'],
						'custom_panel' => $search_panel);

		$this->load->view('main', $params);

        $this->_footer();

	}

	function map_config(array $config = array(), array $place = array())
	{
		$config['places'] = TRUE;
		$config['geocodeCaching'] = TRUE;

		$config['placesAutocompleteInputID'] = 'placeText';
		$config['placesAutocompleteBoundsMap'] = TRUE;

		$this->googlemaps->initialize($config);

		if (!empty($place))
		{
			$marker = array();
			$marker['position'] = $place['place'];
			$marker['infowindow_content'] = $place['message'];
			//$marker['icon'] = $place['icon'];			
			$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';

			$this->googlemaps->add_marker($marker);
		}

		$data['map'] = $this->googlemaps->create_map();

		return $data;
	}

	function select_location()
    {
    	$this->_head();
		$this->load->view('navigation_panel');

    	$location = $this->input->post('location');			
		   	
		$config = array();

		$config['center'] = $location['address'];
		$config['zoom'] = '13';

		$marker = array();
		$marker['place'] = $location['address'];
		$marker['message'] = '1 - Hello World!';

		$data = $this->map_config($config, $marker);

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
    	$this->_head();
		$this->load->view('navigation_panel');

    	$location = $this->input->post('location');			
		    	
		$config = array();

		$config['center'] = $location['address'];
		$config['zoom'] = '13';

		$marker = array();
		$marker['place'] =$location['address'];
		$marker['message'] = '1 - Hello World!';

		$data = $this->map_config($config, $marker);

		print_r($data['map']['js']);

		$map_cache = $this->map_cache->get_map_cache();

		//$memo_panel = $this->load->view('place_memo_panel', '', TRUE);

		$params = array('map' => $data['map']);

		$this->load->view('main', $params);		
		$this->load->view('results_panel', array('selected_location'=>$location));
		$this->load->view('place_memo_panel');

    	$this->_footer();
    }    
}
?>
