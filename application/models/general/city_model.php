<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 *@version 5.3 php
 * @author Pankaj N
 *
 */
class City_model extends CI_Model{
	/**
	 * constructor of cityModel
	 * to inizalize city model's object.
	 */
	function __construct(){
		parent::__construct();
	}
	/**
	 * @author Pankaj
	 * saving city.
	 * @param an object of a city.
	 * @return void
	 * 
	 */
	//adding city to db.
	public function addCity($city){
		$this->db->insert(TABLES::$CITY_TABLE,$city);
	}
	//deleting city from db.
	/*public function deleteCity($id){
		$this->db->where('id',$id);
		$this->db->delete(TABLES::$CITY_TABLE);
	}*/
	//updating city name.
	/**
	 * 
	 * 
	 * update city name
	 * @param  city object
	 * @access public
	 * @throws Exception
	 */
	public function updateCity($city){
		$params = array('name'=>$city['name'],'id !='=>$city['id']);
		// select query.
		$this->db->select('id')->from(TABLES::$CITY_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->where('id',$city['id']);
			$this->db->update(TABLES::$CITY_TABLE, $city);
		}else{
			throw new Exception("City name already exists.");
		}
		
	}
	/**
	 * 
	 * change the status of city from 1 to 0
	 * @access public
	 * @param  $id of city
	 * 	
	 */
	public function turnOffCity($id){
		$city['status']=0;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$CITY_TABLE, $city);
	}
	/**
	 * 
	 * change the status of city from 0 to 1.
	 * @access public
	 * @param id of city
	 */
	public function turnOnCity($id){
		$city['status']=1;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$CITY_TABLE, $city);
	}
	/**
	 * 
	 * get city name,fence and status of city by id
	 * @param city id
	 * @access public
	 * @return result_set
	 */
	public function getCityById($id){
		$this->db->select('id,name,fence,status')->from(TABLES::$CITY_TABLE)->where('id',$id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	/**
	 * get all the cities.
	 * @param no param
	 * @access public
	 * @return array_list
	 */
	public function getAllCities(){
		$this->db->select('id,name,fence,status')->from(TABLES::$CITY_TABLE)->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
?>