

1.index.php
localhost/studyCI/index.php/welcome
localhost/studyCI/index.php/welcome/index


2.config/database.php


3.build new model


4.system/core/Common.php
增加全局函数


5.show my model
url:
localhost/studyCI/index.php/welcome/getmodel


6.config/autoload.php
设置db,url的库引用



7.进行分页显示
  7.1创建权限管理表
  	 用户
  	 权限
  	 角色
  	 模块

  sql语句:
  1.用户表已经创建
  insert into user(id,ename,name) values('0001','tom','史蒂芬');
  insert into user(id,ename,name) values('0002','Lisa','利纳斯');
  insert into user(id,ename,name) values('0003','anny','安杰丽娜');
  2.角色表
  create table role(
   rid varchar(100),
   rolename varchar(300)
  )

  insert into role(rid,rolename) values('0001','sys');
  insert into role(rid,rolename) values('0002','system');
  insert into role(rid,rolename) values('0003','user');
  insert into role(rid,rolename) values('0004','ouser');


  3.用户与角色的关联表
  creare table urrelative
  (
  	id varchar(100),
  	rid varchar(100)
  )

  insert into urrelative(id,rid) values('00003','0001')
  insert into urrelative(id,rid) values('0001','0002')
  insert into urrelative(id,rid) values('0002','0004')
  insert into urrelative(id,rid) values('0003','0003')



内连查询:符合对应的条件才全部显示出来
方式:
select * from 
user as u inner join urrelative as ur inner join role as r
where u.id=ur.id and r.rid=ur.rid;




功能点的开发:CI的excel的demo



