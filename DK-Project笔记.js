DK-Project:

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



