<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class LOcality_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
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
	public function updateLocality($locality){
		$params = array('name'=>$locality['name'],'id !='=>$locality['id']);
		// select query.
		$this->db-select('id')->from(TABLES::$LOCALITY_TABLE)->where($params);
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
	public function turnOffLocality($id){
		$locality['status']=0;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$LOCALITY_TABLE, $locality);
	}
	
	public function turnOnLocality($id){
		$locality['status']=1;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$LOCALITY_TABLE, $locality);
	}
	public function getLocalityById($id){
		$this->db->select('id,name,latitude,longitude,status')-from(TABLES::$LOCALITY_TABLE)->where('id',$id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function getAllLocalities(){
		$this->db->select('id,name,latitude,longitude,status')->from(TABLES::$LOCALITY_TABLE)->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
?>