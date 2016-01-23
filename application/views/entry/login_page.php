<div class="container">
	<div class="col-lg-12 col-md-12 col-sm-12 colxs-12">
		<div class="row">
			<h3 class="text-center"><small>注册页面</small></h3>
		</div>
	</div>
	<br>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
			<form action="" class="register-form" method="post">
				<input name="email" type="text" class="form-control email" placeholder="您的邮箱">
				<input name="pwd" type="text" class="form-control pwd" placeholder="密码">
				<input name="pwd-cfm" type="text" class="form-control pwd-cfm" placeholder="密码确认">
				<input type="button" class="btn btn-primary register-submit" value="注册">
			</form>
		</div>
	</div>

</div>

<script>
$('input.register-submit').click(function(){
	//
	var email = $('input.email').val();
	var pwd = $('input.pwd').val();
	var pwd_cfm = $('input.pwd-cfm').val();
	if(email == ''){
		layer.msg('邮箱不能为空');
		return false;
	}else if (pwd=='') {
		layer.msg('密码不能为空');
		return false;
	}else if(pwd.length < 6 || pwd.length > 20){
		layer.msg('密码在6-20位之间');
		return false;
	}else if(pwd !== pwd_cfm){
		layer.msg('密码不一致，请确认输入');
		return false;
	};
	// 获取表单所有的数据
	var submitData = $('form.register-form').serialize();
	alert('test');
	// var C = new common;
	console.log(common.ajaxRequest('test'));
})
</script>

