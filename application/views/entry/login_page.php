<?php
// 获取到session数据
$front_sess = $this->session->front_user;


?>



<?php //var_dump($this->session->front_user); ?>

<?php if ($front_sess==NULL): ?>
	未登陆
<?php else: ?>
	
<?php endif ?>

<!-- <div class="col-xs-12"> -->
	<div class="row">
		<br>
	</div>
<!-- </div> -->



<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 colxs-12">
			<h3 class="text-center">
				<small>
					<b><?php echo $page_title; ?></b>
				</small>
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
				<form action="" class="login-form" method="post">
					<div class="form-group">
						<input name="email" type="text" class="form-control email" placeholder="您的邮箱">
					</div>
					<div class="form-group">
						<input name="pwd" type="password" class="form-control pwd" placeholder="密码">
					</div>
					<div class="form-group">
						<input type="button" class="btn btn-info login-btn col-lg-3 col-lg-offset-4 col-xs-3 col-xs-offset-4" value="登录">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

// 用户点击登录操作
$('input.login-btn').click(function(){
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
	};
	// 获取表单所有的数据
	var submitData = $('form.login-form').serialize();
	var submitUrl = '<?php echo site_url('entry/login_action'); ?>'; // ajax提交到的url地址
	var result = common.ajaxRequest(submitUrl, submitData);
	if (result.status==1) {
		// 登录成功
		layer.msg(result.msg);
		setTimeout(function(){
			// 1.5秒以后，跳转
			window.location.href = "<?php echo site_url('index/index'); ?>";
		},1500);
		return false;
	} else {
		// 登录失败
		layer.msg(result.msg);
		return false;
	}
})
</script>

