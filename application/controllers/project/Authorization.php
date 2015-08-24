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
		$data=$this->role->selectInnerJoin();
		for ($i=0; $i <count($data) ; $i++) { 
			foreach ($data[$i] as $key => $val) {
				$data[$i][$key]=urlencode($val);
			}
		}
		// json对象的转码  test ok！
		// $datajson['one']=urldecode(json_encode($data));
		$datajson='1111111111111';
		$this->load->view('project/AuthorizationView',$datajson);

	}





}