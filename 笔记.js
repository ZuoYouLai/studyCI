

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
  create table urrelative
  (
    id varchar(100),
    rid varchar(100)
  )ENGINE=INNODB DEFAULT CHARSET=utf8;

  insert into urrelative(id,rid) values('00003','0001')
  insert into urrelative(id,rid) values('0001','0002')
  insert into urrelative(id,rid) values('0002','0004')
  insert into urrelative(id,rid) values('0003','0003')



内连查询:符合对应的条件才全部显示出来
方式:
select * from 
user as u inner join urrelative as ur inner join role as r
where u.id=ur.id and r.rid=ur.rid;




功能点的开发:CI的excel的demo  test-->ok


CI框架查出的乱码问题：
ENGINE=INNODB DEFAULT CHARSET=utf8;



下面的数据可以正常的插入数据库中并没有显示乱码: 测试是ok.
new table:
create table testTable(
  idname varchar(200),
  incontent varchar(1000)
)ENGINE=INNODB DEFAULT CHARSET=utf8;


insert into testTable(idname,incontent) values('春天游乐园','麦兜的世界');





验证码的功能：
1.CI本身自带的验证码  --->ok
  引入对应的类库
  直接使用

2.自定义的验证码
  2.1 引进类库到application/libraries中
  2.2 再引入对应的字体 system/fonts
  2.3 设置参数并直接使用



3.使用Session来进行保存验证码  - Login类  ok


4.session与验证码做登陆的功能  - Login类  ok
  4.1 创建表
    create table longintable(
       uname varchar(200),
       upassword varchar(500)
    )ENGINE=INNODB DEFAULT CHARSET=utf8;

    insert into longintable(uname,upassword) values('admin',md5('admin'));
    insert into longintable(uname,upassword) values('1',md5('1'));

    <?php echo isset($mylog)?"":$mylog ?>

  4.2 验证码进行刷新:
          <!-- 点击图片进行刷新 -->
          <img src="<?php echo site_url().'/demo/login/Meidentifycode'; ?>"  onClick="this.src=this.src+'?'+Math.random();">



5.进行对全局的session的控制   
    application/core/MY_Controller.php  进行写一个全局的session函数
    然后让各个对应的controller进行继承MY_Controller类,全部的类的构造函数都会实现对session的校验


    **************************************
      工程项目需要有2个工程目录与application同级的目录：
      文件夹的名称为：
        captcha
        uploads
    **************************************

6.公共的模块的代码
<?php $this->load->view('index/right.html') ?>










  


