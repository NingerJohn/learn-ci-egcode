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
					<input name="pwd_cfm" type="password" class="form-control pwd-cfm" placeholder="密码确认">
				</div>
				<div class="form-group">
					<input name="email_captcha" type="text" class="form-control email-captcha" placeholder="请输入邮箱验证码">
					<input type="button" class="btn btn-info get-email-captcha" value="获取邮箱验证码">
				</div>
				<div class="form-group">
					<input type="button" class="btn btn-primary register-submit col-lg-3 col-lg-offset-4" value="注册" id="btn">
				</div>
			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
// 用户点击获取邮箱验证码
$('input.get-email-captcha').click(function() {
	// body...
	var email = $('input.email').val();
	if ( email == '' ) {
		// statement
		layer.msg('请输入邮箱');
	} else {
		// statement
		var url = "<?php echo site_url("entry/get_email_captcha") ?>";
		var submitData = {'email':email};
		var res = common.ajaxRequest(url, submitData);
		layer.msg(res.msg);
	}
})

// 用户离开邮件验证码输入框
$('input.email-captcha').focusout(function() {
	/* Act on the event */
	var emailCaptcha = $(this).val();
	var email = $('input.email').val();
	var submitData = {'email':email,'captcha':emailCaptcha};
	var url = '<?php echo site_url('entry/check_register_captcha') ?>';
	var result = common.ajaxRequest(url, submitData);
	layer.msg(result.msg);
});


// 用户点击提交操作
$('input.register-submit').click(function(){
	// 基本判断
	// console.log($(this));
	// console.log();
	var email = $('input.email').val(); // 邮箱地址
	var pwd = $('input.pwd').val(); // 第一个密码
	var pwd_cfm = $('input.pwd-cfm').val(); // 确认密码
	var email_captcha = $('input.email-captcha').val(); // 邮箱验证输入框的值
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
	}else if (email_captcha=='') {
		layer.msg('请输入邮箱验证码');
		return false;
	};
	// 获取表单所有的数据
	var submitData = $('form.register-form').serialize();
	var submitUrl = '<?php echo site_url('entry/register_submit'); ?>'; // ajax提交用户数据到处理注册的url地址
	var result = common.ajaxRequest(submitUrl, submitData);
	if (result.status==1) {
		// 注册成功
		layer.msg(result.msg);
		setTimeout(function(){
			window.location.href= "<?php echo site_url('entry/login'); ?>";
		},1500);
		return false;
	} else {
		// 注册失败
		layer.msg(result.msg);
		return false;
	}
})
</script>

