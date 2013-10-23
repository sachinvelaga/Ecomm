<?php
	class Product_header_model extends CI_Model{
		public function __construct(){
			//$this->load->database();
		}

		public function createHeader($header_code , $name , $store_id , $category_id)
		{
			$header_id = $this->getHeaderId($header_code,$name);
			if($header_id)
			{
				return $header_id;
			}
			$data = array("header_code"=>$header_code,
				"name"=>$name,
				"store_id"=>$store_id,
				"category_id"=>$category_id
			);
			$this->db->insert("product_header" , $data);
			if($this->db->insert_id())
			{
				return $this->db->insert_id();
			}
			return false;
		}
		public function getHeaderId($header_code,$name)
		{
			$data = $this->db->query("select id from product_header where  header_code = ?",array($header_code ));
			if($data->num_rows() > 0)
			{
				$header = $data->row_array();
				return $header['id'];
			}
			return false;
		}
		public function getSelectedCatalogues($query_string = '')
		{
			$where = "b.header_code != ''";
			if(!empty($query_string))
			{
				$where.=" and b.name like '%".($query_string)."%'";
			}
			$this->db->distinct("a.header_id");
			$this->db->select("a.header_id AS id, b.header_code AS GroupId, a.sku_code AS ProductId, b.name AS MovieTitle, s.name AS Store, c.name AS SubCategory, a.price AS Price, a.shipping_duration AS ShippingDuration");
			$this->db->join('product_header b','a.header_id = b.id','LEFT');
			$this->db->join('store s','s.id = b.store_id','LEFT');
			$this->db->join('category c','c.id = b.category_id','LEFT');
			$this->db->where($where);
			$this->db->order_by('RAND()');
			$this->db->limit(8);
			$data = $this->db->get('product_sku a')->result_array();
			return $data;
		}
}?>