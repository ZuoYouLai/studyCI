<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册界面</title>
	<link rel="stylesheet" href="<?php  echo base_url().'style/style.css'  ?>">
</head>
<body>
	<form action="<?php echo site_url().'/project/Register/importInfo'; ?>" method="POST"  enctype="multipart/form-data">
		<table>
			<!-- 账号-学号
			身份证
		    名字
		    所属单位或者班级
		    专业方向
		    列为发展对象的时间
		    推优通过率
		    所属班别
		    班内分组
		    校区
		    培训期数 -->
			<tr>
				<td>学号:</td>
				<td>
					<input type="text" name='idnum' id='idnum'>
					<label id="idnum_tip"></label>
				</td>
			</tr>
			<tr>
				<td>名字:</td>
				<td><input type="text" name='uname' id='uname'>
				<label id="uname_tip"></label></td>
			</tr>
			<tr>
				<td>校区:</td>
				<td>
					<input type="radio" name='sarea' value='东莞校区' checked>东莞校区
					<input type="radio" name='sarea' value='湛江校区'>湛江校区
				</td>
			</tr>
			<tr>
				<td>身份:</td>
				<td>
					<input type="radio" name='idper' value='学生' checked>学生
					<input type="radio" name='idper' value='教师'>教师
				</td>
			</tr>
			<tr>
				<td>学院:</td>
				<td>
					<select name="accademy" id="accademy">
						<option value="">请选择</option>
						<option value="信息工程学院">信息工程学院</option>
						<option value="临床学院">临床学院</option>
						<option value="检验学院">检验学院</option>
					</select>
					<label id="accademy_tip"></label>
				</td>
			</tr>
			<tr>
				<td>专业:</td><td>
					<select name="acprofes" id="acprofes">
						<option value="">请选择</option>
						<option value="医学信息系统">医学信息系统</option>
						<option value="生物医学工程">生物医学工程</option>
					</select>
					<label id="acprofes_tip"></label>
				</td>
			</tr>
			<tr>
				<td>年级:</td>
				<td><input type="text" name='grade' id='grade' onfocus="WdatePicker({skin:'whyGreen',maxDate:'%y-%M-%d-1',isShowClear:true,readOnly:true,dateFmt:'yyyy'})">
					<label id="grade_tip"></label>
				</td>
			</tr>
			<tr>
				<td>列为发展对象的时间:</td>
				<td><input type="text" name="lwdxtime" id='lwdxtime' onfocus="WdatePicker({skin:'whyGreen',maxDate:'%y-%M-%d-1',isShowClear:true,readOnly:true,dateFmt:'yyyy-MM-dd'})">
					<label id="lwdxtime_tip"></label>
				</td>
			</tr>
			<tr>
				<td>推优通过率:</td>
				<td><input type="text" name="typercent" id='typercent'>%
					<label id="typercent_tip"></label>
				</td>
			</tr>
			<tr>
				<td>所属班别:</td>
				<td><input type="text" name='tgrade'  id='tgrade'>
					<label id="tgrade_tip"></label>		
				</td>
			</tr>
			<tr>
				<td>班内分组:</td>
				<td><input type="text" name='tgroup' id='tgroup'>
					<label id="tgroup_tip"></label>	
				</td>
			</tr>
			<tr>
				<td>培训期数:</td>
				<td><input type="text" name="pxnum" id="pxnum">
					<label id="pxnum_tip"></label>	
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type="submit" value='注册' id="mysubmit">
				</td>
			</tr>
		</table>
	</form>
</body>
<script type="text/javascript" src="<?php  echo base_url().'style/js/jquery-1.11.1.min.js'  ?>"></script>
<script type="text/javascript" src="<?php  echo base_url().'style/js/My97DatePicker/WdatePicker.js'  ?>"></script>
<script type="text/javascript" src="<?php  echo base_url().'style/js/project/base.js'  ?>"></script>
<script type="text/javascript" src="<?php  echo base_url().'style/js/project/register.js'  ?>"></script>
</html>