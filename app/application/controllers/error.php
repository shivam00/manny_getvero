<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	

	public function __construct() 
	{
		parent::__construct();

// Load form helper library
		$this->load->helper('form');

// Load form validation library
		$this->load->library('form_validation');

// Load session library
		$this->load->library('session');


		$this->load->library('email');
// Load database
// Load database
		$this->load->model('login_database');
	}


	public function index()
	{
		$this->load->helper('url');
		$this->load->view('errors/404');
	}

	public function error_500()
	{
		$this->load->helper('url');
		$this->load->view('errors/500');
	}

}

