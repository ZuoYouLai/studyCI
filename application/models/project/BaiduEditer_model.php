<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaiduEditer_model extends CI_Model{

		// ����:����һ������
	public function insertOneData($data)
	{

		$this->db->insert('dx_stu_login',$data);
	}
	
}