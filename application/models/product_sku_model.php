<?php
	class Product_sku_model extends CI_Model{
		public function __construct(){
			//	$this->load->database();
		}
		public function createSku($sku_code , $header_id , $price , $shipping_duration)
		{
			$data = array("sku_code"=>$sku_code,
				"header_id"=>$header_id,
				"price"=>$price,
				"shipping_duration"=>$shipping_duration
			);
			$this->db->insert("product_sku" , $data);
			if($this->db->insert_id())
			{
				return $this->db->insert_id();
			}
			return false;
		}
		public function getProduct($sku_code)
		{
			$where = "a.sku_code = '".$sku_code."'";
			$this->db->select('a.header_id AS id, b.header_code AS GroupId, a.sku_code AS ProductId, b.name AS MovieTitle, s.name AS Store, c.name AS SubCategory, a.price AS Price, a.shipping_duration AS ShippingDuration');
			$this->db->join('product_header b','a.header_id = b.id','LEFT');
			$this->db->join('store s','s.id = b.store_id','LEFT');
			$this->db->join('category c','c.id = b.category_id','LEFT');
			$this->db->where($where);
			$data = $this->db->get('product_sku a')->row_array();
			return $data;
		}
		public function getRelatedProducts($header_id , $sku_code)
		{
			$where ="a.header_id = '".$header_id."' and sku_code != '".$sku_code."'";
			$this->db->select("b.header_code AS GroupId, a.sku_code AS ProductId, b.name AS MovieTitle, s.name AS Store, c.name AS SubCategory, a.price AS Price, a.shipping_duration AS ShippingDuration");
			$this->db->join('product_header b','a.header_id = b.id','LEFT');
			$this->db->join('store s','s.id = b.store_id','LEFT');
			$this->db->join('category c','c.id = b.category_id','LEFT');
			$this->db->where($where); 
			$data = $this->db->get('product_sku a')->result_array();
			return $data;
		}
}?>