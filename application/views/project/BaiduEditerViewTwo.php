<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页内容</title>
	<link href="<?php echo base_url() . 'style/' ?>css/style.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url() ?>ueditor1/ueditor.config.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>ueditor1/ueditor.all.min.js"></script>
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "<?php echo base_url() ?>ueditor1/";
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth = 1024;
			window.UEDITOR_CONFIG.initialFrameHeight = 500;
			UE.getEditor('content');	
		}
		// UE.getEditor('editor');
	</script>
	<style type="text/css">
		span{color: red}
	</style>
</head>
<body>
	<div class="formcontent">
		<form action="<?php echo site_url() .'/project/BaiduEditer/saveInfoTwo'?>" id="myform" method='post'>
				<td>编辑器:</td>
				<td>
					<textarea name="content"  id="content">
					</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="提交">
				</td>
			</tr>
		</form>
	</div>
</body>
</html>

