<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('product_header_model','product_header');
			$this->load->model('product_sku_model','product_sku');
		}

		public function index()
		{
			$this->load->view('home.php');
		}

		public function catalogue () {
			$data = $this->product_header->getSelectedCatalogues();
			echo json_encode($data);
		}
		public function product($sku_code){
			$data = $this->product_sku->getProduct($sku_code);
			echo json_encode($data);
		}
		public function search()
		{
			$query_string = isset($_REQUEST['query']) ? trim($_REQUEST['query']) : '';
			if(!empty($query_string))
			{
				$data =   $this->product_header->getSelectedCatalogues($query_string);
				echo json_encode($data);
			} else{
			 $this->catalogue();
			}
		}
		public function related()
		{
			$header_id =   isset($_REQUEST['id']) ? trim($_REQUEST['id']) : '';
			$prod_id =   isset($_REQUEST['productId']) ? trim($_REQUEST['productId']) : '';
			$data = $this->product_sku->getRelatedProducts($header_id , $prod_id);
			echo json_encode($data);
		}
	}

	/* End of file welcome.php */
	/* Location: ./application/controllers/welcome.php */