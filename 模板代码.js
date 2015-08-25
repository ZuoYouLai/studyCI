

<?php  echo ''  ?>


<?php  echo site_url() .''  ?>


ajax的代码:
	//ajax的写法
	$.ajax({
		url:'/studyCI/index.php/project/Authorization/ajaxtext',
		type:'POST',
		// data:"1",
		success:function(data,status){
			debugger;
			alert(data);
		},
		error:function(){

		}
	});

JSON字符串转换为JavaScript对象。
要修复它，通过标准JSON.parse()或jQuery 的 $.parseJSON 将其转换为JavaScript对象。