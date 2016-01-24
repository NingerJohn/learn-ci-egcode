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
				<div class="form-group">
					<input name="email" type="text" class="form-control email" placeholder="您的邮箱">
				</div>
				<div class="form-group">
					<input name="pwd" type="password" class="form-control pwd" placeholder="密码">
				</div>
				<div class="form-group">
					<input name="pwd-cfm" type="password" class="form-control pwd-cfm" placeholder="密码确认">
				</div>
				<div class="form-group">
					<input type="button" class="btn btn-info register-submit col-lg-3 col-lg-offset-4" value="注册" id="btn">
				</div>
			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
// 用户点击提交操作
$('input.register-submit').click(function(){
	// 基本判断
	// console.log($(this));
	// console.log();
	var email = $('input.email').val(); // 获取邮箱地址
	var pwd = $('input.pwd').val(); // 获取第一个密码
	var pwd_cfm = $('input.pwd-cfm').val(); // 获取确认密码
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
	console.log('test');
	// 获取表单所有的数据
	var submitData = $('form.register-form').serialize();
	var result = common.ajaxRequest(submitUrl, submitData);
	var submitUrl = '<?php echo site_url('entry/register_submit'); ?>'; // ajax提交用户数据到处理注册的url地址
	if (result.status==1) {
		// 注册成功
		layer.msg(result.msg);
		return false;
	} else {
		// 注册失败
		layer.msg(result.msg);
		return false;
	}
})
</script>

