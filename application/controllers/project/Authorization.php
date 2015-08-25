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
		for ($i=0; $i <count($data) ; $i++) { 

		// 	foreach ($data[$i] as $key => $val) {
		// 		$data[$i][$key]=urlencode($val);
		// 	}
		}
		// json对象的转码  test ok！
		// $datajson=urldecode(json_encode($data));
		// echo $datajson;
		p($data);
	}


}