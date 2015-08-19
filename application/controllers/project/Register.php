<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		//定向到注册页面层
		$this->load->view('project/RegisterView');

	}

	public function importInfo()
	{
		// 保存注册用户的信息
		$this->load->model('project/Register_model','register');
		$data=array(
			'id'=>time().mt_rand(1,99),
			'user_name'=>$this->input->post('idnum'),
			'user_pwd'=>$this->input->post('idnum'),
			'name'=>$this->input->post('uname'),
			'school_zone'=>$this->input->post('sarea'),
			'identifynumber'=>$this->input->post('idper'),
			'belong'=>$this->input->post('accademy'),
			'specialty'=>$this->input->post('acprofes'),
			'start_time'=>$this->input->post('lwdxtime'),
			'ngrade'=>$this->input->post('grade'),
			'pass_rate'=>$this->input->post('typercent'),
			'class'=>$this->input->post('tgrade'),
			'period'=>$this->input->post('pxnum'),
			'group'=>$this->input->post('tgroup'),
			'status'=>'0'
		);
		// p($data);die();
		// $index=array('status'=>'0');
		$this->register->insertOneData($data);
		success('project/Register','注册成功...');
	}

	

}