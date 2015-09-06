<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('a_model');
  }  
  /*----------------------------------*/



	public function index()
	{
		$this->load->view('home');
	}

}

	
	