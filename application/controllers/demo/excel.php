<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends MY_Controller {

	//构造函数
	function __construct()
	{
		parent::__construct();
	}


	//导出并下载功能函数
	public function index()
	{
		//进行查询对应的数据并把相应的数据写在excel表上
		$this->load->model('Page_model','page');
		$data['userinfos']=$this->page->getrelativion();

		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
		$objPHPExcel=new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
		// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', iconv('gbk', 'utf-8', '中文Hello'))->setCellValue('B2', 'world!')->setCellValue('C1', 'Hello');

		$col=0;
		$arrgroup= array('id','rid');
		foreach ($arrgroup as $v) {
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $v);
			$col++;
		}

		// $row=count($data['userinfos']);
		$row=2;
		// p($data['userinfos'][0]['id']);
		// p($data['userinfos']);die;
		foreach ($data['userinfos'] as  $data) {
			$col=0;
			foreach ($arrgroup as $field) {
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]);
				$col++;
			}
			$row++;
		}

		$objPHPExcel->setActiveSheetIndex(0);




		// Excel这里有2种格式
		// $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
		//发送标题强制用户下载文件
		header('Content-Type: application/vnd.ms-excel');
		// 2种格式
		// header('Content-Disposition: attachment;filename="Products_'.date('dMy').'.xls"');
		header('Content-Disposition: attachment;filename="Products_'.date('dMy').'.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');


	}


	//导入功能
	public function import()
	{
		$this->load->view("model/importExcel");
	}

	public function importInfo()
	{
		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
		//上传对应的Excel文件
		//文件上传
		//基本配置
		$config['upload_path']='./uploads/';
		$config['allowed_types'] = 'xls|xlsx|xl';
		$config['max_size'] = '20000';
		$config['file_name'] = time() . mt_rand(1000,9999);

		//载入上传类
		$this->load->library('upload',$config);
		//执行上传
		$status=$this->upload->do_upload('Excel');
		$wrong=$this->upload->display_errors();
		if ($wrong) {
			error($wrong);
		}

		//返回信息
		$info=$this->upload->data();
		// p($info);

		//再进行解析对应的Excel文件
		//找到对应的文件
		$targetfile='./uploads/'.$info['file_name'];
		//生成对应的格式
		//需要注意的是,这里的excel文件要对应好不同的格式
		$objReader=IOFactory::createReader('Excel2007');
		//读取整个execl文件生成excel的object
		$objPHPExcel=$objReader->load($targetfile);
		//读取第一行sheet
		$sheet=$objPHPExcel->getSheet(0);
		//获取总行数
		$hightRow=$sheet->getHighestRow();
		// 取得总列数
		$hightColum=$sheet->getHighestColumn(); 
		//全部的excel对象数组
		p($objPHPExcel->getActiveSheet()->toArray());
		p($hightRow);
		p($hightColum);
		//再进行插入数据库进行保存

	}


}