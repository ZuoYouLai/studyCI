<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaiduEditer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project/BaiduEditer_model','baiduEditer');
	}

	public function index()
	{
		$this->load->view('project/BaiduEditerView');
		
	}
	public function indexTwo()
	{
		$this->load->view('project/BaiduEditerViewTwo');
		
	}

	public function saveInfo()
	{
			$data=$this->input->post('content');
			p($data);die();
	}

	public function saveInfoTwo()
	{
		// 最新的百度编辑器的功能->只需要配置对应的path即可 配置文件设置非常的棒  降低学习成本
			$data=$this->input->post('content');
			p($data);die();
	}



}