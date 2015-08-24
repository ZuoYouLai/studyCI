DK-Project:

localhost/studyCI/index.php

0.导入数据库的操作
	0.0找出对应的sql语句

1.注册的功能
	1.学员的注册的内容值：
		账号-学号
		身份证
	    名字
	    所属单位或者班级
	    专业方向
	    列为发展对象的时间
	    推优通过率
	    所属班别
	    班内分组
	    校区
	    培训期数

==样板代码==
	增加表：alter table 表名 add 列名 列类型；
	alter table mytable add age number(2);

	修改表的一个列: alter table 表名 modify  需要修改的列名  列类型
	alter table mytable modify age varchar2(3);

	删除一个列：alter table 表名 drop column 列名
	alter table mytable  drop column age;
	
添加身份证字段:
表名：dx_stu_login
sql语句：
	alter table dx_stu_login add identifynumber varchar(30) DEFAULT NULL COMMENT '身份证'
	alter table dx_stu_login add ngrade varchar(30) DEFAULT NULL COMMENT '年级'

缺少一个用户的年级	ngrade

修改列：
alter table dx_stu_login modify id varchar(100);

注册页面:
jq的闭包的写法：
	// 不能为空的判断 [闭包操作]
	for(var i=0;i<$textallobj.length;i++)
	{
		$($textallobj[i]).blur((function(j){return function(){}})(i));	
	}



上午:
注册的校验的基本完成，注意一开始的需求的问题，不然会影响代码重构的问题



下午:
php的批量导入的功能:样式-工作簿-排列
	//在controller里面的方法的互相调用
	$this->XX('Excel5','学生信息表.xls');//调用的方法
	1.先导出   【材料为先】  ok

	2.再导入
	===================================API参考============================================
	//读取Excel文件
	$PHPExcel = $PHPReader->load($filePath);
	  
	//获取工作表的数目
	$sheetCount = $PHPExcel->getSheetCount();
	  
	//选择第一个工作表
	$currentSheet = $PHPExcel->getSheet(0);
	  
	//取得一共有多少列
	$allColumn = $currentSheet->getHighestColumn();   
	  
	//取得一共有多少行
	$allRow = $currentSheet->getHighestRow();
	=======================================================================================


	3.新建一张百度编辑器的文章
	create table baiduaticle(
		id varchar(100),
		content text DEFAULT NULL COMMENT '编辑器的内容信息',
		imginfo varchar(500) DEFAULT NULL COMMENT '图片信息',
		realcontent text DEFAULT NULL COMMENT '纯文本信息',
		htmlcontent text DEFAULT NULL COMMENT '文本加上html格式的信息',
		PRIMARY KEY (`id`),
		otherinfo varchar(1000) DEFAULT NULL COMMENT '其他信息的存取'
	) ENGINE=MYISAM DEFAULT CHARSET=gbk COMMENT='百度编辑器存放的文章的信息表' AUTO_INCREMENT=1 ;



//uuid()  测试  ok
insert into baiduaticle(id,content)  values(uuid(),"您好...");


=====================权限管理的功能===============================
表名:
	用户表
	角色表
	权限表
	模块表
	功能表

--用户表：
create table lxd_users(
	uid varchar(100) primary key comment '用户id',
	name varchar(100) comment '用户名称',
	sex varchar(10) comment '用户性别',
	addr varchar(1000) comment '用户地址',
	content varchar(500) comment '用户内容',
	rid varchar(100) comment '管理角色表id(多对多)'
);

--用户表&角色表：
create table lxd_users_role(
	uid varchar(100) comment '用户id',
	rid varchar(100) comment '角色id'
)


--角色表：
create table lxd_role(
	rid varchar(100) primary key comment '角色id',
	rname varchar(100) comment '角色名称',
	rgroup varchar(100) comment '角色分组',
	rcontent varchar(500) comment '角色内容',
	pid varchar(100) comment '权限表id(多对多)'
);


--角色表&权限表：
create table lxd_role_power(
	rid varchar(100) comment '角色id',
	pid varchar(100) comment '权限id'
)

--权限表:
create table lxd_power(
	pid varchar(100) primary key comment '权限id',
	pname varchar(100) comment '权限名称',
	pgroup varchar(100) comment '权限分组',
	rcontent varchar(500) comment '权限内容',
	mid varchar(100) comment '功能表id(多对多)'
);

--模块表&权限表：
create table lxd_power_module(
	mid varchar(100) comment '模块id',
	pid varchar(100) comment '权限id'
)

--模块表:
create table lxd_module(
	mid varchar(100) primary key comment '模块id',
	mname varchar(100) comment '模块名称',
	mgroup varchar(100) comment '模块分组',
	mcontent varchar(500) comment '模块内容',
	mid varchar(100) comment '功能表id(多对多)'
);

--模块表&功能表：
create table lxd_power_feature(
	mid varchar(100) comment '模块id',
	fid varchar(100) comment '功能id'
)


--功能表:
create table lxd_feature(
	fid varchar(100) primary key comment '功能id',
	fname varchar(100) comment '功能名称',
	fgroup varchar(100) comment '功能分组',
	fcontent varchar(500) comment '功能内容',
);













===========================================start========================================================
DROP TABLE lxd_users;
DROP TABLE lxd_user;
CREATE TABLE lxd_user(
	uid VARCHAR(100) PRIMARY KEY COMMENT '用户id',
	NAME VARCHAR(100) COMMENT '用户名称',
	sex VARCHAR(10) COMMENT '用户性别',
	addr VARCHAR(1000) COMMENT '用户地址',
	content VARCHAR(500) COMMENT '用户内容'
)ENGINE=MYISAM DEFAULT CHARSET=gbk COMMENT='用户表' AUTO_INCREMENT=1 ;

DROP TABLE lxd_users_role;
DROP TABLE lxd_user_role;
CREATE TABLE lxd_user_role(
	uid VARCHAR(100) COMMENT '用户id',
	rid VARCHAR(100) COMMENT '角色id'
)ENGINE=MYISAM DEFAULT CHARSET=gbk COMMENT='用户与角色关联表' AUTO_INCREMENT=1 ;

DROP TABLE lxd_role;
CREATE TABLE lxd_role(
	rid VARCHAR(100) PRIMARY KEY COMMENT '角色id',
	rname VARCHAR(100) COMMENT '角色名称',
	rgroup VARCHAR(100) COMMENT '角色分组',
	rcontent VARCHAR(500) COMMENT '角色内容'
)ENGINE=MYISAM DEFAULT CHARSET=gbk COMMENT='角色表' AUTO_INCREMENT=1 ;

DROP TABLE lxd_role_power;
CREATE TABLE lxd_role_power(
	rid VARCHAR(100) COMMENT '角色id',
	pid VARCHAR(100) COMMENT '权限id'
);

DROP TABLE lxd_power;
CREATE TABLE lxd_power(
	pid VARCHAR(100) PRIMARY KEY COMMENT '权限id',
	pname VARCHAR(100) COMMENT '权限名称',
	pgroup VARCHAR(100) COMMENT '权限分组',
	rcontent VARCHAR(500) COMMENT '权限内容'
);

DROP TABLE lxd_power_module;
CREATE TABLE lxd_power_module(
	MID VARCHAR(100) COMMENT '模块id',
	pid VARCHAR(100) COMMENT '权限id'
);

DROP TABLE lxd_module;
CREATE TABLE lxd_module(
	MID VARCHAR(100) PRIMARY KEY COMMENT '模块id',
	mname VARCHAR(100) COMMENT '模块名称',
	mgroup VARCHAR(100) COMMENT '模块分组',
	mcontent VARCHAR(500) COMMENT '模块内容'
);

DROP TABLE lxd_power_feature;
CREATE TABLE lxd_power_feature(
	MID VARCHAR(100) COMMENT '模块id',
	fid VARCHAR(100) COMMENT '功能id'
);


DROP TABLE lxd_feature;
CREATE TABLE lxd_feature(
	fid VARCHAR(100) PRIMARY KEY COMMENT '功能id',
	fname VARCHAR(100) COMMENT '功能名称',
	fgroup VARCHAR(100) COMMENT '功能分组',
	fcontent VARCHAR(500) COMMENT '功能内容'
);

===========================================end========================================================
权限管理系统(Authorization):

角色表:
insert into lxd_role(rid,rname,rgroup,rcontent) values(uuid(),'超级管理员','00001','管理全校');
insert into lxd_role(rid,rname,rgroup,rcontent) values(uuid(),'管理员','00002','管理一个校区');

用户表:
insert into lxd_user(uid,name,sex,addr,content) values(uuid(),'赖豪达','男','广州','毕业生');
insert into lxd_user(uid,name,sex,addr,content) values(uuid(),'罗勤夫','男','深圳','毕业生');

角色与用户表:
insert into lxd_user_role(uid,rid) values('0dc74e1d-4a6b-11e5-bb9c-11815420a4d5','5922a8bf-4a6a-11e5-bb9c-11815420a4d5');
insert into lxd_user_role(uid,rid) values('0dcb3dc7-4a6b-11e5-bb9c-11815420a4d5','593619b8-4a6a-11e5-bb9c-11815420a4d5');


添加列:
alter table lxd_role add rpgroup varchar(100);

====CI的第一条查询====
select * from lxd_user as u  inner join lxd_user_role as ur  inner join lxd_role as r where u.uid=ur.uid and r.rid=ur.rid;