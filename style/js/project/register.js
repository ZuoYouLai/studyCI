$(function(){


	function Register()
	{
		//校验用户信息的位数
		this.checkTextContentNum=function(obj,len)
		{
			var tobj=$("#"+obj).val();
			if (tobj.length==len) {
				return true;
			}else{
				return false;
			}
		}

		//判断是否有空值
		this.checkIsEmpty=function(obj,objtip,tip)
		{
			var 
				contents=tip||"不可为空",
				$objtip=$("#"+objtip),
				$eobj=$("#"+obj).val();
			if (!$eobj) {
				$objtip
					   .text(contents)
					   .css('color','red');
			}else{
				$objtip
					   .text("ok")
					   .css('color','green');
			}
		}

	}





	//变量值
	var 
		idnum="idnum",
		mysubmit="mysubmit",
		// uname="uname",
		// accademy="accademy",
		// acprofes="acprofes",
		// grade="grade",
		// lwdxtime="lwdxtime",
		// arr=[accademy,acprofes,grade];
		// typercent="typercent",
		// tgrade="tgrade",
		idfunobj=new Register(),
		$idtipobj=$('#idnum_tip'),
		$mysubmitobj=$('#mysubmit'),
		$textallobj=$(':text'),
		// $accademyobj=$('#accademy'),
		// $acprofesobj=$('#acprofes'),
		// $gradeobj=$('#grade'),
		// $lwdxtimeobj=$('#lwdxtime'),
		// $typercentobj=$('#typercent'),
		// $tgrade=$('#tgrade'),
		$idobj=$('#idnum');




	//离开文本框
	// $idobj.on('blur',function(){
	// 	// 学号的11位的校验
	// 	var flg=idfunobj.checkTextContentNum(idnum,11);
	// 	if (flg) {
	// 		$idtipobj
	// 			.text('ok')
	// 			.css('color','green');
	// 	}else{
	// 		$idtipobj
	// 			.text('请输入11位的学号.')
	// 			.css('color','red');
	// 	}
	// });

	// 不能为空的判断 [闭包操作]
	for(var i=0;i<$textallobj.length;i++)
	{
		
		$($textallobj[i]).blur((function(j){
			return function()
			{
				var $blurobj=$($textallobj[j]);
				var 
					blurobjvalue=$blurobj.val(),
				    idname=$blurobj.attr('id'),
				    tipname=idname+'_tip',
				    $objtip=$('#'+idname+"_tip");
				//校验id号
				if (idname.trim()==idnum) {
					var flg=idfunobj.checkTextContentNum(idnum,11);
					if (flg) {
						$objtip
							.text('ok')
							.css('color','green');
					}else{
						$objtip
							.text('请输入11位的学号.')
							.css('color','red');
					}
				}else if(idname.trim()==grade || idname.trim()==lwdxtime){
					return;
				}else{
					//其他不为空的文本框
					idfunobj.checkIsEmpty(idname,tipname);
				}
			}
		})(i));
	}



	//直接进行注册
	$mysubmitobj.on('click',function(){
		//全部text文本判断
		for(var i=0;i<$textallobj.length;i++)
		{
			var 
				textallobjone=$($textallobj[i]),
				textallobjoneid=textallobjone.attr('id'),
				textallobjonevalue=textallobjone.val();
			if (textallobjonevalue==idnum) {
				
			};
			if (!textallobjonevalue) {
				if (true) {};
			};

		}
	});


});