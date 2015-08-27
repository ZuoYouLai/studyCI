<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>权限管理系统[AuthorizationView]</title>
	<link rel="stylesheet" href="<?php  echo base_url() .'style/Bootstrap/css/bootstrap.min.css'  ?>">
	<link href="<?php echo base_url() . 'style/' ?>css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url() . 'style/' ?>css/tiv.css" rel="stylesheet" />
	<link href="<?php echo base_url() . 'style/' ?>css/ez-min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url() . 'style/' ?>css/ztreecss/zTreeStyle/zTreeStyle.css" type="text/css">

</head>
<body>
<!-- 头部 -->
<div class="header">
	<nav class="navbar navbar-default" role="navigation">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">
	    	<b>权限管理系统</b></a>
	  </div>

	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">人员管理</a></li>
	      <li><a href="#">权限管理</a></li>
	    </ul>
	  </div>
	</nav>
</div>
<!-- 
<div id='treedata'>
</div> -->

<!-- 内容页 -->
<div class="main">
	<div class="ez-wr ">
		<div class="ez-fl ez-negmx ez-25 " >
			<ul class="nleftul">
	  			<li>
	  				<span>
	  					用户管理
	  				</span>
	  			</li>
	  			<li>
	  				<span>
	  					角色管理
	  				</span>
	  			</li>
	  			<li>
	  				<span>
	  					权限管理
	  				</span>
	  			</li>
	  			<li>
	  				<span>
	  					模块管理
	  				</span>
	  			</li>
	  			<li>
	  				<span >
	  					功能管理
	  				</span>
	  			</li>
	  		</ul>
		</div>
		<div class="ez-last ez-oh">
			<div class="ez-wr">
				<div class="ez-fl ez-negmx ez-25 mianboder">
					<ul id="treeDemo" class="ztree"></ul>
				</div>
				<div class="ez-fl ez-negmx ez-75 ">
					<div class="adduser">
						<button type="button" class="btn btn-info" id="getUserInfobtn">查看信息</button>
						<button type="button" class="btn btn-primary" id="addUserbtn">添加用户</button>
						<button type="button" class="btn btn-danger" id="delUserbtn">删除用户</button>
					</div>
					<table class="table table-hover maincenter">
						<thead>
						<tr class='mtr'>
							<td><b>#</b></td>
							<td class="hide1"><b>id</b></td>
							<td><b>用户名</b></td>
							<td><b>管理权限</b></td>
							<td><b>所属学院</b></td>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td><input type="checkbox"></td>
							<td>001</td>
							<td>赖豪达</td>
							<td>超级管理员</td>
							<td>东莞校区</td>
						</tr>
						<tr>
							<td><input type="checkbox"></td>
							<td>002</td>
							<td>罗勤夫</td>
							<td>管理员</td>
							<td>二级学院</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 遮罩 -->



<!-- 尾页 -->

</body>
	<script type="text/javascript" src="<?php  echo base_url() .'style/js/ztreejs/jquery-1.4.4.min.js'  ?>"></script>
	<script type="text/javascript" src="<?php  echo base_url() .'style/js/ztreejs/jquery.ztree.core-3.5.js'  ?>"></script>
  	<script src="<?php  echo base_url() .'style/js/tiv.js'  ?>"></script>
</html>