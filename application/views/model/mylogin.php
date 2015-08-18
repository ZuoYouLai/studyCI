<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyLogin Page</title>
</head>
<body>
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