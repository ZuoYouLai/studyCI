<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model{
	// 表对象  dx_stu_login


	// 功能:插入一条数据
	public function insertOneData($data)
	{

		$this->db->insert('dx_stu_login',$data);
	}

	//查询全部的值
	public function getAllData()
	{
		$data=$this->db->get('dx_stu_login')->result_array();
		return $data;
	}

	//批量导入
	// $this->db->insert_batch('mytable', $data);
	public function insertAllbatch($data)
	{
		$this->db->insert_batch('dx_stu_login', $data);
	}



}