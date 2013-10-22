<?php
class Product_sku_model extends CI_Model{
	public function __construct(){
		$this->load->database();
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

}?>