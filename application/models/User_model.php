<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//demo
class User_model extends CI_Model{

	//查询全部
	public function selectAll()
	{
		$data=$this->db->get('user')->result_array();
		return $data;
	}




}