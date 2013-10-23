<?php
	class Category_model extends CI_Model{
		public function __construct(){
		//$this->load->database();
		}
		public function createCategory($name , $parent_id)
		{
			$category_id  = $this->getCategoryId($name);
			if($category_id){
				return $category_id;
			}
			$data = array("name"=>$name,
				"parent_id"=>$parent_id );
			$this->db->insert('category', $data);
			if($this->db->insert_id()){
				return $this->db->insert_id();
			}
			return false;
		}
		public function getCategoryId($name)
		{
			$data = $this->db->query("select id  from category where name = ?", array($name));
			if($data->num_rows() > 0)
			{
				$category = $data->row_array();
				return $category['id'];
			}
			return false;
		}	
}?>