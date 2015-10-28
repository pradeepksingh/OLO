<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_Item_model extends CI_Model{
	/**
	 * constructor of menu item Model
	 * to inizalize menu item model's object.
	 */
	function __construct(){
		parent::__construct();
	}
	/**
	 * @author Pankaj
	 * saving category_id and menu item name.
	 * @param an object of a menu_item_model.
	 * @return void
	 *
	 */
	//adding menu item to db.
	public function addMenuItem($menuItem){
		$data = array();
		$params = array('name'=>$menuItem['name']);
		// select query.
		$this->db->select('id')->from(TABLES::$MENU_ITEM_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->insert(TABLES::$MENU_ITEM_TABLE,$menuItem);
			$data['status'] = 1;
			$data['message']="added successfully";
			return  $data;
		}else{
			$errors['menuitem'] = "Menu item name already exists.";
			$data['status']=0;
			$data['message']=$errors;
			return $data;
		}
		
	}
	
	//updating menu item name.
	/**
	 *
	 *
	 * update menu item name and category_id
	 * @param  menu item object
	 * @access public
	 * @return json object of menu item
	 */
	public function updateMenuItem($menuItem){
		$data = array();
		$params = array('name'=>$menuItem['name'],'catid'=>$menuItem['catid'],
				'price'=>$menuItem['price'],'due'=>$menuItem['due'],'id !='=>$menuItem['id']);
		// select query.
		$this->db->select('id')->from(TABLES::$MENU_ITEM_TABLE)->where($params);
		//returns the result of select query.
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0){
			$this->db->where('id',$menuItem['id']);
			$this->db->update(TABLES::$MENU_ITEM_TABLE, $menuItem);
			$data['status']=1;
			$data['message']="updated successfully";
			return  $data;
		}else{
			$errors['menuitem'] = "menu item name already exists.";
			$data['status']=0;
			$data['message']=$errors;
			return  $data;
		}
		
	}
	/**
	 *
	 * change the status of menu item from 1 to 0
	 * @access public
	 * @param  $id of menu item
	 *
	 */
	public function turnOffMenuItem($id){
		$menuitem['status']=0;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$MENU_ITEM_TABLE, $menuitem);
	}
	/**
	 *
	 * change the status of menu item from 0 to 1
	 * @access public
	 * @param  $id of menu item
	 *
	 */
	public function turnOnMenuItem($id){
		$menuitem['status']=1;
		$this->db->where('id',$id);
		$this->db->update(TABLES::$MENU_ITEM_TABLE, $menuitem);
	}
	/**
	 *
	 * get menu item name and category_id of category by id
	 * @param menu item id
	 * @access public
	 * @return result_set
	 */
	public function getMenuItemById($id){
		$this->db->select('id,catid,name,price,due')->from(TABLES::$MENU_ITEM_TABLE)->where('id',$id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	/**
	 * get all the menu items.
	 * @param no param
	 * @access public
	 * @return array_list
	 */
	public function getAllMenuItems(){
		$this->db->select('*')->from(TABLES::$MENU_ITEM_TABLE)->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}
?>