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
		//定向到注册页面层
		$this->load->view('project/BaiduEditerView');
		
	}

	public function saveInfo()
	{
		//保存百度编辑的内容

	}


}