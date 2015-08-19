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
				return true;
			}
		}

	}


});