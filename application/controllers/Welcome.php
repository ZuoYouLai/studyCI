<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

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

	//Ci乱码的测试1  --  单单echo中文字符是ok的
	public function wordcode()
	{
		$data="你好！赖先生";
		p($data);
		$this->load->view('model/wordcodeTopage');

	}

	// 测试二 :在页面进行返回给controller再返回给view层 --测试通过
	public function wordcodeTopage() 
	{
		$data=$this->input->post('myTxt');
		p($data);
	}


	// 测试三 ：也就只有数据库乱码的问题了
	public function wordcodeDataBase()
	{
		// CREATE TABLE IF NOT EXISTS `users` (  
		//   `id` INT(8) NOT NULL AUTO_INCREMENT,  
		//   `name` VARCHAR(30) CHARACTER SET utf8 DEFAULT NULL,  
		//   `age` VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL,  
		//   `sex` VARCHAR(2) CHARACTER SET utf8 DEFAULT NULL,  
		//   PRIMARY KEY  (`id`)  
		// ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=14 ;
		$this->load->model('testTable_model','test');
		$data=$this->test->selectAll();
		p($data);


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
