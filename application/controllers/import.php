<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Import extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('import_model','import');
		   $this->load->library('csvreader');
		}

		public function index()
		{
			$this->load->view('import/import.php');
		}
	  public function upload_csv()
	  {
	     $data =     $this->csvreader->parse_file($_FILES['file']['tmp_name']);
	  //   debugbreak();
	    $status = $this->import->uploadCSVtodb($data);
	  }
	
	}