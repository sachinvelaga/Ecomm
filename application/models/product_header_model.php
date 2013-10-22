<?php
class Product_header_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
 
   public function createHeader($header_code , $name , $store_id , $category_id)
  	{
  	 $header_id = $this->getHeaderId($header_code, $name);
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
  	public function getHeaderId($header_code)
  	{
  	  $data = $this->db->query("select id from product_header where header_code = ?", array($header_code));
  	  if($data->num_rows() > 0)
  	  {
  	    $header = $data->row_array();
  	    return $header['id'];
  	  }
  	  return false;
  	}
}?>