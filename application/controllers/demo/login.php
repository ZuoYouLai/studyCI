<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		//验证码的认证
		$this->load->view('model/identifycode');

	}

	public function ciidentifycode()
	{
		//CI本身自带的验证码工具类
		//载入验证码辅助函数
		$this->load->helper('captcha');
		//验证码选的内容值
		$content='1234567890abcdefghizklmnopqrstuvwsyz';
		$outportcontent='';
		for ($i=0; $i <4 ; $i++) { 
			//用随机值进行给单个的验证码
			$outportcontent.=$content[mt_rand(0,strlen($content) - 1)];
		}

		//验证码的配置项
		$config=array(
			'word' =>$outportcontent,
			'img_path'=>'./captcha/',
			'img_url'=>base_url().'/captcha/',
			'img_width'=>80,
			'img_height'=>25,
			'expiration'=>60
		);
		//创建验证码
		$cap=create_captcha($config);
		// p($cap);die;
		//在公共库引入session类  autoload
		$this->session->set_userdata($cap);
		p('以下是session数据:');
		p($this->session->userdata());die;

	}

	public function Meidentifycode()
	{
		$config=array(
			'width'=>80,
			'height'=>25,
			'codeLen'=>4,
			'fontSize'=>16
		);
		$this->load->library('code',$config);
		$this->code->show();
	}

	public function getseesionIfon()
	{
		p('以下是session数据:');
		p($this->session->userdata('code'));
	}

	public function getIdentifyFromMecode()
	{
		$this->load->view('model/getIdentifyFromMecode');
	}


	//使用session进行校验
	public function getDataIndex()
	{
		$this->load->view('model/mylogin');
	}


	public function getDataByusername()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$indentitycode=$this->input->post('indentitycode');
		$this->load->model('longin_model','mylogin');
		//先验证码的校验
		$realcode=$this->session->userdata('code');
		// p($indentitycode.'<hr>'.$realcode);die();
		if (strtoupper($indentitycode)!=$realcode) {
			success('demo/login/getDataIndex','验证码错误...');
		}
		//再进行用户的判断
		$data=$this->mylogin->selectOneUserByName($username);
		$size=count($data);
		if ($size) 
		{
			if (md5($password)!=$data[0]['upassword']) {
				success('demo/login/getDataIndex','用户不存在或密码错误...');
			}
			//进行session的赋值
			$seesiondata=array(
				'username'=>$data[0]['upassword'],
				'logintime'=>time()
			);
			$this->session->set_userdata($seesiondata);
			success('welcome/index','登陆成功...');
		}else
		{
			success('demo/login/getDataIndex','用户不存在或密码错误...');
		}

		// p(count($data));die();
	}

	public function deletesession()
	{
		$this->session->sess_destroy();
		success('demo/login/getDataIndex','退出成功...');
	}


}