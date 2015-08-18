<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>wordcodeTopage 测试二</title>
</head>
<body>
	<form action="<?php echo site_url().'/Welcome/wordcodeTopage'; ?>" method="post">
		<input type="text" name="myTxt">
		<input type="submit" value="测试">
	</form>

	<br>	
	<a href="<?php echo site_url().'/Welcome/wordcodeDataBase'; ?>">CI框架查出的数据乱码的测试【数据编码ok】</a>
</body>
</html>