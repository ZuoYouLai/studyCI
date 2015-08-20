<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>importExcel</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data" action="<?php echo site_url().'/project/Register/inportExcel'; ?>">
	选择导入的Excel文件:
	<br>
	<input type='file' name='Excel' >
	<br>
	<input type="submit" value="上传我的Excel文件">
	</form>
</body>
</html>