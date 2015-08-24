<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lxd_role_model extends CI_Model{

	//多表关联的查询全部
	public function selectInnerJoin()
	{
		// select * from lxd_user as u  inner join lxd_user_role as ur  inner join lxd_role as r where u.uid=ur.uid and r.rid=ur.rid;
		$data=$this->db->select('u.uid,r.rid,u.sex,u.addr,u.content,u.name as uname,r.rname as name,r.rgroup,r.rcontent,r.rpgroup as pid,r.rgroup as id')->from('lxd_user as u')->join('lxd_user_role as ur','u.uid=ur.uid')->join('lxd_role as r','r.rid=ur.rid')->get()->result_array();
		return $data;
	}


	//单表的查询  用户与角色关联表
	public function getrelativion()
	{
		$data=$this->db->get('urrelative')->result_array();
		return $data;
	}




}