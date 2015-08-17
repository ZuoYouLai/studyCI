<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetPage extends CI_Controller {

	public function index()
	{




		$this->load->model('Page_model','page');
		//test is ok[多表关联查询]
		$data['userinfos']=$this->page->selectInnerJoin();
		$count=count($data['userinfos']);
		// $count=count($data,1);
		// p($data);
		// p($count);die;
		// $this->load->view('model/getPage',$data);



		//进行分页的处理
		//载入分页类
		$this->load->library('pagination');
		//设置的页码
		$perPage=1;

		//配置项设置
		$config['base_url']=site_url('demo/getPage/index');
		//这里是总页数
		$config['total_rows']=$count;
		$config['per_page']=$perPage;
		//url的片段
		$config['uri_segment']=4;
		$config['first_link']='第一页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$config['last_link']='最后一页';

		//把对应的参数加载到对应的分页类内
		$this->pagination->initialize($config);
		//产生对应页数的链接
		$data['links']=$this->pagination->create_links();
		// p($data['links']);die;

		//获取对应的url的片段
		$offset=$this->uri->segment(4);
		$this->db->limit($perPage,$offset);

		$data['newuserinfos']=$this->page->selectInnerJoin();

		$this->load->view('model/getPage',$data);





	}

}