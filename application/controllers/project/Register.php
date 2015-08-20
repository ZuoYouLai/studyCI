<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project/Register_model','register');
		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
	}

	public function index()
	{
		//定向到注册页面层
		$this->load->view('project/RegisterView');

	}

	public function inportforwodPage()
	{
		$this->load->view('project/inportforwodPage');
	}

	public function importInfo()
	{
		// 保存注册用户的信息
		$data=array(
			'id'=>time().mt_rand(1,99),
			'user_name'=>$this->input->post('idnum'),
			'user_pwd'=>$this->input->post('idnum'),
			'name'=>$this->input->post('uname'),
			'school_zone'=>$this->input->post('sarea'),
			'identifynumber'=>$this->input->post('idper'),
			'belong'=>$this->input->post('accademy'),
			'specialty'=>$this->input->post('acprofes'),
			'start_time'=>$this->input->post('lwdxtime'),
			'ngrade'=>$this->input->post('grade'),
			'pass_rate'=>$this->input->post('typercent'),
			'class'=>$this->input->post('tgrade'),
			'period'=>$this->input->post('pxnum'),
			'group'=>$this->input->post('tgroup'),
			'status'=>'0'
		);
		// p($data);die();
		// $index=array('status'=>'0');
		$this->register->insertOneData($data);
		success('project/Register','注册成功...');
	}


	//批量导出Excel
	public function outportExcel()
	{
		//查出了全部的数据
		$alldata=$this->register->getAllData();
		$objPHPExcel=new PHPExcel();
		//创建了3个工作簿
		for ($i=1; $i<=3; $i++) { 
			// 新建的objPHPExcel对象就已经新建的sheet对象
			if ($i >1) {
				//创建新的内置表
				$objPHPExcel->createSheet();
			}
			//把新创建的sheet设定为当前活动sheet
			$objPHPExcel->setActiveSheetIndex($i-1);
			//获取当前活动sheet
			$objSheet=$objPHPExcel->getActiveSheet();
			// p($objSheet);die();
			//给当前活动sheet起个名称
			$objSheet->setTitle('第'.$i.'个工作簿');
			//填充数据 [固定的数据]
			$objSheet->setCellValue("A1","姓名")->setCellValue("B1","校区")->setCellValue("C1","学院")->setCellValue("D1","专业")->setCellValue("E1","年级")->setCellValue("F1","班级")->setCellValue("G1","分组");
			$j=2;
			foreach ($alldata as $key => $value) {
				//插入具体的数据
				$objSheet->setCellValue("A".$j,$value['user_name'])->setCellValue("B".$j,$value['school_zone'])->setCellValue("C".$j,$value['belong'])->setCellValue("D".$j,$value['specialty'])->setCellValue("E".$j,$value['ngrade'])->setCellValue("F".$j,$value['class'])->setCellValue("G".$j,$value['group']);
				$j++;
			}
		}

			$objWriter=IOFactory::createWriter($objPHPExcel, 'Excel2007');
			//在controller里面的方法的互相调用
			$this->browser_export('Excel2007','学生信息表.xlsx');//输出到浏览器
			$objWriter->save("php://output");
	}



	//导入Excel数据
	public  function inportExcel()
	{
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
		//获取总的sheet数
		$size=$objPHPExcel->getSheetCount();
		//全部数据保存在的数组
		$alldata=array();
		for($i=0;$i<$size;$i++)
		{
			//读取第一行sheet
			$sheet=$objPHPExcel->getSheet($i);
			//获取总行数
			$hightRow=$sheet->getHighestRow();
			// 取得总列数
			$hightColum=$sheet->getHighestColumn(); 
			//全部的excel对象数组
			// p($objPHPExcel->getActiveSheet()->toArray());
			// p($hightColum);
			// p($hightRow);
			// echo "<hr>";
			// 获取excel对象的全部数据
			$importdata=$objPHPExcel->getActiveSheet()->toArray();
			$z=0;
			// 存放字段值数组
			$firstname=array();
			foreach ($importdata as $key => $value) {
				if ($z==0) {
					$firstname=$this->toNameforArray($value);
				}else{
					$newinfoarr=$this->newarraydata($firstname,$value);
					//生成新的数组
					array_push($alldata,$newinfoarr); 
				}
				$z++;
			}
		}
		// p($alldata);
		//批量导入问题
		$this->register->insertAllbatch($alldata);
		success('demo/login/getDataIndex','批量导入'.count($alldata).'条数据成功....');
	}
	// 传入2个数组 进行拼出对应新的数组
	function newarraydata($infoarr,$miarr)
	{
		$realarr=array();
		$i=0;
		foreach ($infoarr as $key => $value) {
			$realarr[$value]=$miarr[$i];
			if ($value=="user_name") {
				//密码重新设置 名称的md5码
				$realarr['user_pwd']=md5($miarr[$i]);
				//设置id值
				$realarr['id']=time().mt_rand(1000,9999);
			}
			$i++;
		}
		return $realarr;
	}


	//名字进行赋值
	function toNameforArray($arr)
	{
		$newarray=array();
		$size=count($arr);
		for ($i=0; $i<$size; $i++) { 
			$needname=$this->oneByoneForName($arr[$i]);
			// $newarray = array_merge($newarray,$needname); 
			array_push($newarray,$needname);  
		}
		return $newarray;
	}

	//一一对应的字符串对应
	function oneByoneForName($str)
	{
		// [0] => 姓名
	    // [1] => 校区
		// [2] => 学院
		// [3] => 专业
		// [4] => 年级
		// [5] => 班级
		// [6] => 分组
		switch ($str) {
		case '姓名':return 'user_name';break;
		case '校区':return 'school_zone';break;
		case '学院':return 'belong';break;
		case '专业':return 'specialty';break;
		case '年级':return 'ngrade';break;
		case '班级':return 'class';break;
		case '分组':return 'group';break;
		default: return"";break;
		}
	}


	// 随机数生成
	function getIdrandnum($size)
	{
		//元素
		$one=range(0,9);
		$two=range('a','z');
		$three=range('A', 'Z');
		//进行组拼在一起
		array_push($two,$one); 
		array_push($two,$three); 
		return $two;
	}


	function browser_export($type,$filename){
		if($type=="Excel5"){
				header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
		}else{
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
		}
		header('Content-Disposition: attachment;filename="'.$filename.'"');//告诉浏览器将输出文件的名称
		header('Cache-Control: max-age=0');//禁止缓存
	}
	

}