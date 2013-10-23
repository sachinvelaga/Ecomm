<?php
	class Store_model extends CI_Model{
		public function __construct(){
			//$this->load->database();
		}
		public function createStore($name)
		{
			$store_id = $this->getStoreId($name);
			if($store_id)
			{
				return $store_id;
			}
			$data = array("name"=>$name);
			$this->db->insert('store', $data);
			if($this->db->insert_id()){
				return $this->db->insert_id();
			}
			return false;
		}
		public function getStoreId($name)
		{
			$data = $this->db->query("select id from store where name = ?",array($name));
			if($data->num_rows() > 0)
			{
				$store = $data->row_array();
				return $store['id'];
			}
		}	
}?>