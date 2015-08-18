<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestTable_model extends CI_Model{

	//查询全部
	public function selectAll()
	{
		$data=$this->db->get('testTable')->result_array();
		return $data;
	}




}