<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Zone_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	//adding zone to db.
	public function addZone($zone){
		$this->db->insert(TABLES::$ZONE_TABLE,$zone);
	}
	//deleting city from db.
	/*public function deleteCity($id){
		$this->db->where('id',$id);
		$this->db->delete(TABLES::$CITY_TABLE);
	}*/
	//updating zone name.
	public function updateZone($zone){
		$params = array('name'=>$zone['name'],'id !='=>$zone['id']);
		// select query.
		$this->db-select('id')->from(TABLES::$ZONE_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->where('id',$zone['id']);
			$this->db->update(TABLES::$ZONE_TABLE, $zone);
		}else{
			throw new Exception("Zone name already exists.");
		}
		
	}
	public function turnOffZone($id){
		$zone['status']=0;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$ZONE_TABLE, $zone);
	}
	
	public function turnOnZone($id){
		$zone['status']=1;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$ZONE_TABLE, $zone);
	}
	public function getZoneById($id){
		$this->db->select('id,name,fence,status')-from(TABLES::$ZONE_TABLE)->where('id',$id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function getAllZones(){
		$this->db->select('id,name,fence,status')->from(TABLES::$ZONE_TABLE)->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
?>