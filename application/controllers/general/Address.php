<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Address extends CI_Controller{
	/**
	 *
	 * Dashboard
	 */
	public function index(){
		$this->load->view('general');
	}

	/**
	 *
	 * get all city name on load.
	 */
	public function citylist(){
		$this->load->model('general/city_model','city');
		$result = $this->city->getAllCities();
		$data = array();
		$data['cities'] = $result;
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/city',$data);
		$this->load->view('footer');
	}
	/**
	 * Show the page for adding new city
	 */
	public function newcity(){
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/newcity');
		$this->load->view('footer');
	}
	/**
	 * Saving the city name entered by user
	 * @param city name
	 * @method post
	 * @return name of city as list
	 */
	public function savecity(){
		
		$this->load->model('general/city_model','city');
		
		$city = NULL;
		//$fence = NULL;
		$status = 1;
		$submit = NULL;
		
		extract($_POST);
		
		$param['name'] = $city;
		//$param['fence'] = $fence;
		$param['status'] = $status;
		if(isset($submit))
		{
			$this->city->addCity($param);
		}
		 $this->citylist();
		
	}
	/**
	 * get all zone name on load.
	 */
	public function zonelist(){
		$this->load->model('general/zone_model','zone');
		$result = $this->zone->getAllZones();
		$data = array();
		$data['zones'] = $result;
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/zone',$data);
		$this->load->view('footer');
	}
	/**
	 * 
	 * show the page for adding new zone
	 */
	public function newzone(){
		$this->load->model('general/city_model','city');
		$drop = $this->city->getAllCities();
		$data = array();
		$data['citydrop'] = $drop;
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/newzone',$data);
		$this->load->view('footer');
	}
	/**
	 * saving the zone name
	 * @param city id and zone name
	 * @return void
	 * @access public
	 * @author Pankaj
	 */
	public function savezone(){
		$this->load->model('general/zone_model','zone');
		$id = NULL;
		$name = NULL;
		$status = 1;
		$savezone = NULL;
		
		extract($_POST);
		
		$params['city_id'] = $id;
		$params['name'] = $name;
		$params['status'] = $status;
		if(isset($savezone)){
			$this->zone->addZone($params);
		}
		$this->zonelist();
	}
	/**
	 * get all locality name on load.
	 */
	public function localitylist(){
		$this->load->model('general/locality_model','locality');
		$result = $this->locality->getAllLocalities();
		$data = array();
		$data['localities'] = $result;
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/locality',$data);
		$this->load->view('footer');

	}
	/**
	 * 
	 * adding new locality.
	 */
	public function newlocality(){
		$this->load->model('general/zone_model','zone');
		$result = $this->zone->getAllZones();
		$data = array();
		$data['zonedrop'] = $result;
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/newlocality',$data);
		$this->load->view('footer');
	}
	/**
	 * saving the locality name
	 * @param zone id and locality name
	 * @return void
	 * @access public
	 * @author Pankaj
	 */
	public function savelocality(){
		$this->load->model('general/locality_model','locality');
		$id = NULL;
		$locality = NULL;
		$status = 1;
		$longitude = NULL;
		$latitude = NULL;
		$savelocality = NULL;
		
		extract($_POST);
		
		$params['zone_id'] = $id;
		$params['name'] = $locality;
		$params['status'] = $status;
		$params['latitude'] = $latitude;
		$params['longitude'] = $longitude;
		if(isset($savelocality)){
			$this->locality->addLocality($params);
		}
		$this->localitylist();
	}
}

?>