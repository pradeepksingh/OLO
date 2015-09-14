<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Address extends CI_Controller{
	/**
	 *
	 * Dashboard
	 * @author Pankaj
	 */
	public function index(){
		$this->load->view('general');
	}

	/**
	 *
	 * get all city name on load.
	 * @author Pankaj
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
	 * @author Pankaj
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
	 * @author Pankaj
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
	 * get the city name by id
	 * @param  $id
	 * @access public
	 * @return city name and id
	 * @author Pankaj
	 */
	public function editcity($id){
		$this->load->model('general/city_model','city');
		$data = array();
		$data['edtcity'] =  $this->city->getCityById($id);
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/editcity',$data);
		$this->load->view('footer');
		
	}
	/**
	 * to updtae city name
	 * @param city name, id
	 * @access public
	 * @return the list of updated city name
	 * @author Pankaj
	 */
	public function updatecity(){
		$params['id'] = $this->input->post('cityid');
		$params['name'] = $this->input->post('updatecityname');
		$this->load->model('general/city_model','city');
		$this->city->updateCity($params);
		$this->citylist();
		
	}
	/**
	 * get all zone name on load.
	 * @author Pankaj
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
	 * @author Pankaj
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
	 * get the zone name by id
	 * @param  $id
	 * @access public
	 * @return zone name and id
	 * @author Pankaj
	 */
	public function editzone($id){
		$this->load->model('general/zone_model','zone');
		$this->load->model('general/city_model','city');
		$data = array();
		$data['edtzone'] =  $this->zone->getZoneById($id);
		$data['cityname'] = $this->city->getAllCities();
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/editzone',$data);
		$this->load->view('footer');
	
	}
	/**
	 * to updtae zone name
	 * @param zone name, id and city_id
	 * @access public
	 * @return the list of updated zone name
	 * @author Pankaj
	 */
	public function updatezone(){
		$params['id'] = $this->input->post('zoneid');
		$params['city_id'] = $this->input->post('cityid');
		$params['name'] = $this->input->post('updatezonename');
		$this->load->model('general/zone_model','zone');
		$this->zone->updateZone($params);
		$this->zonelist();
	
	}
	/**
	 * get all locality name on load.
	 * @author Pankaj
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
	 * @author Pankaj
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
	/**
	 * get the locality name by id
	 * @param  $id
	 * @access public
	 * @return locality name,latitude,longitude and id
	 * @author Pankaj
	 */
	public function editlocality($id){
		$this->load->model('general/locality_model','locality');
		$this->load->model('general/zone_model','zone');
		$data = array();
		$data['edtlocality'] =  $this->locality->getLocalityById($id);
		$data['zonename'] = $this->zone->getAllZones();
		$this->load->view('header');
		$this->load->view('leftnav');
		$this->load->view('general/editlocality',$data);
		$this->load->view('footer');
	
	}
	/**
	 * to updtae locality name
	 * @param locality name, latitude, longitude, id and zone_id
	 * @access public
	 * @return the list of updated locality name
	 * @author Pankaj
	 */
	public function updatelocality(){
		$params['id'] = $this->input->post('localityid');
		$params['zone_id'] = $this->input->post('zoneid');
		$params['name'] = $this->input->post('updatelocalityname');
		$params['latitude'] = $this->input->post('updatelatitude');
		$params['longitude'] = $this->input->post('updatelongitude');
		$this->load->model('general/locality_model','locality');
		$this->locality->updateLocality($params);
		$this->localitylist();
	}
}

?>