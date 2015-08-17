<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//demo
class Page_model extends CI_Model{

	//多表关联的查询全部
	public function selectInnerJoin()
	{
		// select * from 
		// user as u inner join urrelative as ur inner join role as r
		// where u.id=ur.id and r.rid=ur.rid;
		// $data = $this->db->select('aid,title,cname,time')->from('article')->join('category', 'article.cid=category.cid')->order_by('aid', 'asc')->get()->result_array();
		// $data=$this->db->get('user')->result_array();
		$data=$this->db->select('*')->from('user as u')->join('urrelative as ur','u.id=ur.id')->join('role as r','r.rid=ur.id')->get()->result_array();
		return $data;
	}


	//单表的查询  用户与角色关联表
	public function getrelativion()
	{
		$data=$this->db->get('urrelative')->result_array();
		return $data;
	}




}