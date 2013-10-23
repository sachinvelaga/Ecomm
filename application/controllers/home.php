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
      $p = $this->product_header->getSelectedCatalogues();
      echo json_encode($p);
    }
    public function product($sku_code){
      $data = $this->product_sku->getProduct($sku_code);
      echo json_encode($data);
    }
	}

	/* End of file welcome.php */
	/* Location: ./application/controllers/welcome.php */