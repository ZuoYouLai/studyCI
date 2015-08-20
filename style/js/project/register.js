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
		grade="grade",
		lwdxtime="lwdxtime",
		selectindex=[],
		// arr=[accademy,acprofes,grade];
		// typercent="typercent",
		// tgrade="tgrade",
		idfunobj=new Register(),
		$idtipobj=$('#idnum_tip'),
		$mysubmitobj=$('#mysubmit'),
		$textallobj=$(':text'),
		texallsize=$textallobj.length;
		$mselectobj=$('.mselect'),
		// $accademyobj=$('#accademy'),
		// $acprofesobj=$('#acprofes'),
		// $gradeobj=$('#grade'),
		// $lwdxtimeobj=$('#lwdxtime'),
		// $typercentobj=$('#typercent'),
		// $tgrade=$('#tgrade'),
		$idobj=$('#idnum');


	//过滤元素
	$textallobj.each(function(i,obj){
		var mval=$(obj).attr('id');
		if (mval==grade) {
			$(obj).val(getDateInfo('year'));
		};
		if (mval==lwdxtime) {
			$(obj).val(getDateInfo('day'));
		};
		if (mval==grade || mval==lwdxtime) {
			$mselectobj.push(obj);
			selectindex.push(i);
		};
	});

		// 删除元素
		var myfl=0;
		for(var k=0;k<selectindex.length;k++)
		{
			$textallobj.splice(selectindex[k]-myfl,1);
			myfl++;
		}
		// selectindex.each(function(i,val){
		// 	debugger;
		// 	$textallobj.splice(val,1);
		// });
	


	debugger;

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
	for(var i=0;i<texallsize;i++)
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

	//选择框的闭包操作
	$mselectobj.each(function(i,obj){
		$(obj).change((function(j){
			return function()
			{
				var 
					idcon=$(obj).attr('id'),
					tipcon=idcon+'_tip',
					$ctipobj=$('#'+tipcon),
					svacontent=$(obj).val();
				if (!svacontent) {
					$ctipobj.text('选择不能空..');
				}else
				{
					$ctipobj.text('ok').css('color','green');
				}
			}
		})(i));
	});


	//直接进行注册
	$mysubmitobj.on('click',function(){
		//记录内容值标示的数组
		var 
			textsize=$textallobj.length,
			selectsize=$mselectobj.length,
			ctarr=[];

		//全部text文本判断
		for(var i=0;i<textsize;i++)
		{
			var 
				textallobjone=$($textallobj[i]),
				textallobjoneid=textallobjone.attr('id'),
				textallobjonetip=textallobjoneid+'_tip',
				$ttipobj=$('#'+textallobjonetip),
				ttipobjvalue=$ttipobj.text().trim(),
				textallobjonevalue=textallobjone.val().trim();

			if (textallobjoneid==idnum) {
				//用户id
				// 是否为空
				if (textallobjonevalue) {
					if(ttipobjvalue.trim()!="ok")
					{
						ctarr.push(0);
					}
				}else{
					$ttipobj.text('不能为空').css('color','red');
					ctarr.push(0);
				}
				continue;
			};
			if (!textallobjonevalue) {
				$ttipobj.text('不能为空').css('color','red');
				ctarr.push(0);
			};
		}


		//全部的选择框的内容值判断
		for(var j=0;j<selectsize;j++)
		{
			var 
				$sobj=$($mselectobj[j]),
				sid=$sobj.attr('id'),
				sval=$sobj.val().trim(),
				sidtip=sid+'_tip',
				$stipobj=$('#'+sidtip);
				if (!sval) {
				$stipobj
					.css('color','red')
					.text('不能为空');
					ctarr.push(0);
				}
		}

		if (ctarr.length) {
			return false;
		}
		else
		{
			alert('成功插入一条数据...');
		}
	});


});



		//当天的时间  
	    function getDateInfo($info)
	    {
	      var date=new Date;
	      var year=date.getFullYear();
	      var month=date.getMonth()+1;
	      var day=date.getDate();
	      month=(month<10?"0"+month:month);
	      day=(day<10?"0"+day:day);
	      var now= new Date(),
			h=now.getHours()+1,
			m=now.getMinutes(),
			s=now.getSeconds(),
			ms=now.getMilliseconds();
		  m=(m<10?"0"+m:m);
	      h=(h<10?"0"+h:h);
	       s=(s<10?"0"+s:s);
	      var nowDate=(year.toString()+"-"+month.toString()+"-"+day+" "+h+":"+m+":"+s);
	      switch($info)
	      {
	      	case 'year':return year.toString();break;
	      	case 'month':return year.toString()+"-"+month.toString();break;
	      	case 'day':return  year.toString()+"-"+month.toString()+"-"+day;break;
	      	case 'infoday':return nowDate;break;
	      	default:return nowDate;break;
	      }
	    }