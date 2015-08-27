<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lxd_role_model extends CI_Model{

	//多表关联的查询全部
	public function selectInnerJoin()
	{
		// select * from lxd_user as u  inner join lxd_user_role as ur  inner join lxd_role as r where u.uid=ur.uid and r.rid=ur.rid;
		$data=$this->db->select('u.uid,r.rid,u.sex,u.addr,u.content,u.name as uname,r.rname as name,r.rgroup,r.rcontent,r.rpgroup as pId,r.rgroup as id')->from('lxd_user as u')->join('lxd_user_role as ur','u.uid=ur.uid')->join('lxd_role as r','r.rid=ur.rid')->get()->result_array();
		return $data;
	}


	//单表的查询  用户与角色关联表
	public function getrelativion()
	{
		$data=$this->db->get('urrelative')->result_array();
		return $data;
	}

	// 根据条件进行查询对应的用户
	public function getUserByroleId($roid)
	{
		// $data=$this->db->get_where('longintable',array('uname'=>$username))->result_array();
		// $this->db->select('url','name','clientid','people.surname AS client');
		// $this->db->where('clientid', '3');
		// $this->db->limit(5);
		// $this->db->from('sites');
		// $this->db->join('people', 'sites.clientid = people.id');
		// $this->db->orderby("name", "desc");
		// $query = $this->db->get();
		// $data=$this->db->select('*')->from('lxd_user as u')->join('lxd_user_role as ur','u.uid=ur.uid  and ur.rid='.$roid)->get()->result_array();
		// $roid='3bb94a56-4c94-11e5-ba7f-f0def1ef70bb';
		// $this->db->select('u.uid,u.name');
		// $this->db->from('lxd_user as u');
		// $this->db->join('lxd_user_role as ur', 'u.uid=ur.uid');
		// $this->db->where('ur.rid', $roid);
		// $data=$query = $this->db->get();
		// $this->db->query("SELECT id, name, url FROM sites WHERE 'type' = 'dynamic'");
		$data=$this->db->query("select * from lxd_user as u inner join lxd_user_role as ur  where u.uid=ur.uid and  ur.rid='".$roid."'")->result_array();
		return $data;
	}


}