<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Longin_model extends CI_Model{

	//查询全部
	public function selectOneUserByName($username)
	{
		//通过username 来进行查找用户
		$data=$this->db->get_where('longintable',array('uname'=>$username))->result_array();
		return $data;
	}




}