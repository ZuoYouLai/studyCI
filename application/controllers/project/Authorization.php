<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project/Lxd_role_model','role');
	}

	public function index()
	{
		
		$this->load->view('project/AuthorizationView');

	}

	// ajax的测试通过
	public function ajaxtext()
	{
		echo "........";
	}

	// 功能点==树的初始化
	public function ajaxTreeRoleData()
	{
		$data=$this->role->selectInnerJoin();
		for ($i=0; $i <count($data) ; $i++) { 
			foreach ($data[$i] as $key => $val) {
				$data[$i][$key]=urlencode($val);
			}
		}
		// json对象的转码  test ok！
		$datajson=urldecode(json_encode($data));
		echo $datajson;
	}

	//树的节点的点击
	public function TreeNodeClick()
	{
		$roid=$this->input->post('roleid');
		$data=$this->role->getUserByroleId($roid);
		// for ($i=0; $i <count($data) ; $i++) { 
		// 其实，数组中是返回的是一个对象，不能直接用[]来显示，正确的输出方法是：$pic[0]->title
		// echo count($data);
		// p($data[0]);
		// // echo $data[0]->uid;
		// echo $data[0]['uid'];
		// p($data);die();
		for ($i=0; $i <count($data) ; $i++) { 
			foreach ($data[$i] as $key => $val) {
				$data[$i][$key]=urlencode($val);
			}
		}
		// json对象的转码  test ok！
		$datajson=urldecode(json_encode($data));
		echo $datajson;
		// json对象的转码  test ok！
		// $datajson=urldecode(json_encode($data));
		// echo $data;
		// p($data);die();
		// foreach ($data as $key => $value) {
		// 	$data[$key]=urlencode($value);
		// }
		// $datajson=urldecode(json_encode($data));
		// echo $datajson;
		// p(json_encode($data));
		// p($data);
	}


}