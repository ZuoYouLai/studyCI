<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>权限管理系统[AuthorizationView]</title>
	<link rel="stylesheet" href="<?php  echo base_url() .'style/Bootstrap/css/bootstrap.min.css'  ?>">
	<link href="<?php echo base_url() . 'style/' ?>css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url() . 'style/' ?>css/tiv.css" rel="stylesheet" />
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
	    <a class="navbar-brand" href="#">CheckRole</a>
	  </div>

	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">人员管理</a></li>
	      <li><a href="#">权限管理</a></li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">下拉菜单 <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">Action</a></li>
	          <li><a href="#">Another action</a></li>
	          <li><a href="#">Something else here</a></li>
	          <li class="divider"></li>
	          <li><a href="#">Separated link</a></li>
	          <li class="divider"></li>
	          <li><a href="#">One more separated link</a></li>
	        </ul>
	      </li>
	    </ul>
	  </div>
	</nav>
</div>


<!-- 内容页 -->
<div class="main mtf15">
	<div class="row ml15">
	  <div class="col-md-2 bder">
	  		<ul class="leftul">
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
	  			<li class='nobder'>
	  				<span>
	  					功能管理
	  				</span>
	  			</li>
	  		</ul>
	  		<!-- <div class="row">
	  			<div class="col-md-12">用户管理</div>
	  			<div class="col-md-12">角色管理</div>
	  			<div class="col-md-12">权限管理</div>
	  			<div class="col-md-12">模块管理</div>
	  			<div class="col-md-12">功能管理</div>
	  		</div> -->
	  </div>
	  <div class="col-md-9">
	  	
	  </div>
	</div>
</div>


<!-- 尾页 -->

</body>
	<script type="text/javascript" src="<?php  echo base_url() .'style/js/jquery-1.11.1.min.js'  ?>"></script>
  	<script src="<?php  echo base_url() .'style/Bootstrap/js/bootstrap.min.js'  ?>"></script>
</html>