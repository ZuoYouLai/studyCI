<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyLogin Page</title>
</head>
<body>
	<br>
	<br>
	<a href="<?php echo site_url().'/project/Register/index'; ?>">注册</a>
	<a href="<?php echo site_url().'/project/Register/outportExcel'; ?>">批量导出</a>
	<a href="<?php echo site_url().'/project/Register/inportforwodPage'; ?>">批量导入</a>
	<a href="<?php echo site_url().'/project/BaiduEditer/index'; ?>">百度编辑器数据库的操作</a>
	<a href="<?php echo site_url().'/project/BaiduEditer/indexTwo'; ?>">按照需求的百度编辑器</a>
	<a href="<?php echo site_url().'/project/Authorization/index'; ?>">权限管理系统</a>
	<br>
	<br>
	<form method="POST" action="<?php echo site_url().'/demo/login/getDataByusername'; ?>" enctype="multipart/form-data">
		<table  width="100%" border="1" cellspacing="1" cellpadding="0">
			<tr>
				<td>用户名:</td>
				<td colspan="2">
					<input type="text" name='username'>
				</td>
			</tr>
			<tr>
				<td>密码 :</td>
				<td colspan="2">
					<input type="password" name='password'>
				</td>
			</tr>
			<tr>
				<td>
					验证码:
				</td>
				<td>
					<!-- 点击图片进行刷新 -->
					<!-- document.write(Math.random())   0.7695190098602325-->
					<img src="<?php echo site_url().'/demo/login/Meidentifycode'; ?>"  onClick="this.src=this.src+'?'+Math.random();">
				</td>
				<td>
					<input type="text" name='indentitycode'>
				</td>
			</tr>
			<tr>
				<td colspan='4'>
					<input type="submit" value="登陆">
				</td>
			</tr>
		</table>
	</form>
</body>


</html>