<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');


		$this->load->library('form_validation');

		$this->load->helper('url');

		$this->load->library('session');


		$this->load->library('email');

		$this->load->model('login_database');

	}


///////////////////////////////////////////////////////////////////////////////////

	public function index()
	{

		$this->load->view('landin/index.html');
		


	}



}
