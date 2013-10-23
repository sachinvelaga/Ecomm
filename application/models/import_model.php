<?php
	class Import_model extends CI_Model{
		public function __construct(){
			//$this->load->database();
			$this->load->model('store_model','store');
			$this->load->model('category_model','category');
			$this->load->model('product_sku_model','product_sku');
			$this->load->model('product_header_model','product_header');
		}

		public function uploadCSVtodb($data)
		{
			$this->db->trans_start();
			//  debugbreak();
			foreach($data as $d)
			{
				//create store
				$store_id = $this->store->createStore($d['Store']);
				$category_id = $this->category->createCategory($d['Category'],0);
				$sub_category_id  = !empty($d['SubCategory']) ? ($this->category->createCategory($d['SubCategory'] , $category_id)) : $category_id;
				$header_id  = $this->product_header->createHeader($d['GroupId'] , $d['MovieTitle'],$store_id , $sub_category_id);
				$sku_id = $this->product_sku->createSku($d['ProductId'],$header_id , $d['Price'] , $d['ShippingDuration']);
			}
			if($this->db->trans_status())
			{
				$this->db->trans_commit();
			} else{
				$this->db->trans_rollback();
			}

		}	
}?>