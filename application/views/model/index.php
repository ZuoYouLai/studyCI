<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url().'style/style.css'  ?>">
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url().'style/tstyle.css'  ?>">
	<title>index</title>
</head>
<body>
	<div class="navigation">
		<ul>
			<li>
				<a href="<?php echo site_url().'/welcome/index'; ?>">首页</a>
			</li>
			<li>
				<a href="<?php echo site_url().'/welcome/getmodel'; ?>">获取model对象测试</a>
			</li>
			<li>
				<a href="<?php echo site_url().'/demo/getPage/index'; ?>">分页测试</a>
			</li>
			<li>
				<a href="<?php echo site_url().'/demo/excel/index'; ?>">Excel报表导出</a>
			</li>
			<li>
			    <a href="<?php echo site_url().'/demo/excel/import'; ?>">Excel导入</a>
			</li>
			<li></li>
		</ul>
	</div>
	
</body>
</html>