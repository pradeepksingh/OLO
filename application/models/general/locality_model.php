<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Locality_model extends CI_Model{
	/**
	 * constructor of LocalityModel
	 * to inizalize locality model's object.
	 */
	function __construct(){
		parent::__construct();
	}
	/**
	 * @author Pankaj
	 * saving locality,latitude,longitude.
	 * @param an object of a locality.
	 * @return void
	 *
	 */
	//adding locality to db.
	public function addLocality($locality){
		$this->db->insert(TABLES::$LOCALITY_TABLE,$locality);
	}
	//deleting city from db.
	/*public function deleteCity($id){
		$this->db->where('id',$id);
		$this->db->delete(TABLES::$CITY_TABLE);
	}*/
	//updating locality name.
	/**
	 *
	 *
	 * update locality name, longitude, latitude and zone
	 * @param  locality object
	 * @access public
	 * @throws Exception
	 */
	public function updateLocality($locality){
		$params = array('name'=>$locality['name'],'id !='=>$locality['id']);
		// select query.
		$this->db->select('id')->from(TABLES::$LOCALITY_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->where('id',$locality['id']);
			$this->db->update(TABLES::$LOCALITY_TABLE, $locality);
		}else{
			throw new Exception("Locality name already exists.");
		}
		
	}
	/**
	 *
	 * change the status of locality from 1 to 0
	 * @access public
	 * @param  $id of locality
	 *
	 */
	public function turnOffLocality($id){
		$locality['status']=0;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$LOCALITY_TABLE, $locality);
	}
	/**
	 *
	 * change the status of locality from 0 to 1
	 * @access public
	 * @param  $id of locality
	 *
	 */
	public function turnOnLocality($id){
		$locality['status']=1;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$LOCALITY_TABLE, $locality);
	}
	/**
	 *
	 * get locality name, latitude, longitude and zone_id of zone by id
	 * @param locality id
	 * @access public
	 * @return result_set
	 */
	public function getLocalityById($id){
		$this->db->select('id,name,latitude,longitude,status')->from(TABLES::$LOCALITY_TABLE)->where('id',$id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	/**
	 * get all the localities.
	 * @param no param
	 * @access public
	 * @return array_list
	 */
	public function getAllLocalities(){
		$this->db->select('id,name,latitude,longitude,status')->from(TABLES::$LOCALITY_TABLE)->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
?>