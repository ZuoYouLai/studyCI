<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

	//构造函数
	function __construct()
	{
		parent::__construct();
	}


	//功能函数
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
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');

		//发送标题强制用户下载文件
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Products_'.date('dMy').'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');


	}

}