<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('model/index');
	}


	public function getmodel()
	{
		$this->load->model('User_model','user');
		$data['users']=$this->user->selectAll();
		// echo base_url() . 'style/index/';
		// echo site_url() . '/index/home/category';
		p($data);die;
		// $this->load->view('model/getModel',$data);
	}
}
