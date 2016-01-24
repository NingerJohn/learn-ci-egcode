<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo $page_title . ' - ' . $web_title; ?> </title>
	<link rel="stylesheet" href="<?php echo base_url('/public/common/css/bootstrap.min.css') ?>">
	<script src="<?php echo base_url('/public/common/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('/public/common/js/plugins/layer/layer.js'); ?>"></script>
	<script src="<?php echo base_url('/public/common/js/common.js'); ?>"></script>
</head>
<body>

<?php
// 头部获取到session数据，用来区分注册和登陆
$front_sess = $this->session->front_sess;
// var_dump($front_sess);exit;

?>


<nav class="navbar navbar-default navbar-fixed-top navbar-collapse">
	<!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
	<div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar">One</span>
		    <span class="icon-bar">Two</span>
		    <span class="icon-bar">Three</span>
		  </button>
		  <!-- <a class="navbar-brand" href="#">Brand</a> -->
		</div>

		<div class="collapse navbar-collapse">
		  <ul class="nav navbar-nav">
		    <li class="active"><a href="#">Home</a></li>
		    <li>
		    	<a href="#">Movie</a>
		    </li>
		    <li>
		    	<a href="#">Music</a>
		    </li>
			<?php if ($front_sess!==NULL): ?>
				<li class="">
					<a href="<?php echo site_url('index/logout') ?>">Logout</a>
				</li>
			<?php else: ?>
				<li class="">
					<a href="<?php echo site_url('entry/login') ?>">Sign in</a>
				</li>	
			<?php endif ?>
		  </ul>
		</div><!-- /.navbar-collapse -->



	</div>
</nav>



