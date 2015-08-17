<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>getModel</title>
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url().'style/style.css'  ?>">
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url().'style/tstyle.css'  ?>">
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
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	
	<div>
		<table  width="100%" border="1" cellspacing="1" cellpadding="0">
			<tr>
				<td>用户id</td>
				<td>用户名称</td>
				<td>缩略名</td>
				<td>性别</td>
				<td>角色id</td>
				<td>角色名称</td>
				<td>操作</td>
			</tr>
			<?php foreach($newuserinfos as $v):?>
				<tr>
					<td>
						<?php echo $v['id'];  ?>
					</td>
					<td>
						<?php echo $v['name'];  ?>
					</td>
					<td>
						<?php echo $v['ename'];  ?>
					</td>
					<td>
						<?php echo $v['sex'];  ?>
					</td>
					<td>
						<?php echo $v['rid'];  ?>
					</td>
					<td>
						<?php echo $v['rolename'];  ?>
					</td>
					<td>
						[<a href="<?php echo site_url().'/demo/getPage/index'; ?>">删除</a>]
						[<a href="<?php echo site_url().'/demo/getPage/index'; ?>">修改</a>]
					</td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td colspan='7'>
						<div class="page">
						<?php echo $links ?>
						</div>
				</td>
			</tr>
		</table>

	</div>

</body>
</html>