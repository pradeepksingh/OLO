<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Zone_model extends CI_Model{
	/**
	 * constructor of zoneModel
	 * to inizalize zone model's object.
	 */
	function __construct(){
		parent::__construct();
	}
	/**
	 * @author Pankaj
	 * saving city_id and zone name.
	 * @param an object of a locality.
	 * @return void
	 *
	 */
	//adding zone to db.
	public function addZone($zone){
		$data = array();
		$params = array('name'=>$zone['name']);
		// select query.
		$this->db->select('id')->from(TABLES::$ZONE_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->insert(TABLES::$ZONE_TABLE,$zone);
			$data['status'] = 1;
			$data['message']="added successfully";
			return  $data;
		}else{
			$errors['zone'] = "Zone name already exists.";
			$data['status']=0;
			$data['message']=$errors;
			return $data;
		}
		
	}
	//deleting city from db.
	/*public function deleteCity($id){
		$this->db->where('id',$id);
		$this->db->delete(TABLES::$CITY_TABLE);
	}*/
	//updating zone name.
	/**
	 *
	 *
	 * update zone name and city_id
	 * @param  locality object
	 * @access public
	 * @throws Exception
	 */
	public function updateZone($zone){
		$data = array();
		$params = array('name'=>$zone['name'],'id !='=>$zone['id']);
		// select query.
		$this->db->select('id')->from(TABLES::$ZONE_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->where('id',$zone['id']);
			$this->db->update(TABLES::$ZONE_TABLE, $zone);
			$data['status']=1;
			$data['message']="updated successfully";
			return  $data;
		}else{
			$errors['zone'] = "Zone name already exists.";
			$data['status']=0;
			$data['message']=$errors;
			return  $data;
		}
		
	}
	/**
	 *
	 * change the status of zone from 1 to 0
	 * @access public
	 * @param  $id of locality
	 *
	 */
	public function turnOffZone($id){
		$zone['status']=0;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$ZONE_TABLE, $zone);
	}
	/**
	 *
	 * change the status of zone from 0 to 1
	 * @access public
	 * @param  $id of locality
	 *
	 */
	public function turnOnZone($id){
		$zone['status']=1;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$ZONE_TABLE, $zone);
	}
	/**
	 *
	 * get zone name and city_id of city by id
	 * @param zone id
	 * @access public
	 * @return result_set
	 */
	public function getZoneById($id){
		$this->db->select('id,city_id,name,fence,status')->from(TABLES::$ZONE_TABLE)->where('id',$id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	/**
	 * get all the zones.
	 * @param no param
	 * @access public
	 * @return array_list
	 */
	public function getAllZones(){
		$this->db->select('id,name,fence,status')->from(TABLES::$ZONE_TABLE)->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
?>