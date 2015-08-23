<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller {

	public function index()
	{
		$this->load->view('project/AuthorizationView');
	}



}