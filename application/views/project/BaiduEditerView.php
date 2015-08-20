<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页内容</title>
	<link href="<?php echo base_url() . 'style/' ?>css/style.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url() ?>org/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "<?php echo base_url() ?>org/ueditor/";
		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameWidth = 800;
			window.UEDITOR_CONFIG.initialFrameHeight = 200;
			UE.getEditor('content');
		}
	</script>
	<script type="text/javascript" src="<?php echo base_url() ?>org/ueditor/ueditor.config.js"></script>
	<style type="text/css">
		span{color: red}
	</style>
</head>
<body>
	<div class="formcontent">
		<form action="<?php echo site_url() .'/project/BaiduEditer/saveInfo'?>" id="myform" method='post'>
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

