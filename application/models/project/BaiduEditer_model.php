<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaiduEditer_model extends CI_Model{

		// 功能:插入一条数据
	public function insertOneData($data)
	{

		$this->db->insert('dx_stu_login',$data);
	}
	
}