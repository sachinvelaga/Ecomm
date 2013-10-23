<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}

		public function index()
		{
			$this->load->view('home.php');
		}

    public function cataloguessss () {
      $a = array();
      $b = array();
      $a['GroupId'] = 'MV12UN0005';
      $a['ProductId'] = 'MV12UN0005-1';
      $a['MovieTitle'] = 'District 9';
      $a['Store'] = 'Movies';
      $a['Categories'] = 'International Movies';
      $a['Sub Category'] = 'Drama';
      $a['Price'] = '689';
      $a['Shipping Duration'] = '5';

      $b = $a;
      $b['ProductId'] = 'MV12UN0005-2';

      $c = array();
      array_push($c , $a);
      array_push($c , $b);
      echo json_encode($c);
    }
	}

	/* End of file welcome.php */
	/* Location: ./application/controllers/welcome.php */