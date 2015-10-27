<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 *@version 5.3 php
 * @author Pankaj N
 *
 */
class Category_model extends CI_Model{
	/**
	 * constructor of categoryModel
	 * to inizalize category model's object.
	 */
	function __construct(){
		parent::__construct();
	}
	/**
	 * @author Pankaj
	 * saving category.
	 * @param an object of a category.
	 * @return void
	 * 
	 */
	//adding category to db.
	public function addCategory($category){
		$data = array();
		
		$params = array('name'=>$category['name']);
		// select query.
		$this->db->select('id')->from(TABLES::$CATEGORY_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->insert(TABLES::$CATEGORY_TABLE,$category);
			$data['status']=1;
			$data['message']="added successfully";
			return  $data;
		}else{
			$errors['category'] = "category name already exists.";
			$data['status']=0;
			$data['message']=$errors;
			return  $data;
		}
	}
	//deleting category from db.
	/*public function deletecategory($id){
		$this->db->where('id',$id);
		$this->db->delete(TABLES::$category_TABLE);
	}*/
	//updating category name.
	/**
	 * 
	 * 
	 * update category name
	 * @param  category object
	 * @access public
	 * @return array
	 */
	public function updateCategory($category){
		$data = array();
		$params = array('name'=>$category['name'],'id !='=>$category['id']);
		// select query.
		$this->db->select('id')->from(TABLES::$CATEGORY_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->where('id',$category['id']);
			$this->db->update(TABLES::$CATEGORY_TABLE, $category);
			$data['status']=1;
			$data['message']="updated successfully";
			return  $data;
		}else{
				$errors['category'] = "category name already exists.";
			$data['status']=0;
			$data['message']=$errors;
			return  $data;
		}
		
	}
	/**
	 * 
	 * change the status of category from 1 to 0
	 * @access public
	 * @param  $id of category
	 * 	
	 */
	public function turnOffCategory($id){
		$category['status']=0;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$CATEGORY_TABLE, $category);
	}
	/**
	 * 
	 * change the status of category from 0 to 1.
	 * @access public
	 * @param id of category
	 */
	public function turnOnCategory($id){
		$category['status']=1;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$CATEGORY_TABLE, $category);
	}
	/**
	 * 
	 * get category name,fence and status of category by id
	 * @param category id
	 * @access public
	 * @return result_set
	 */
	public function getCategoryById($id){
		$this->db->select('id,name,status')->from(TABLES::$CATEGORY_TABLE)->where('id',$id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	/**
	 * get all the categories.
	 * @param no param
	 * @access public
	 * @return array_list
	 */
	public function getAllCategories(){
		$this->db->select('id,name,status')->from(TABLES::$CATEGORY_TABLE)->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
?>