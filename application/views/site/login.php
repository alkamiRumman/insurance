<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= SHORTNAME ?> | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="assets/adminLte/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/adminLte/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="assets/adminLte/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/adminLte/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="assets/adminLte/plugins/iCheck/square/blue.css">


	<!-- Google Font -->
	<link rel="stylesheet"
	      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<h3><b><?= COMPANY ?></b></h3>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">login to start your session</p>

		<form action="<?= login_url('verify') ?>" method="post">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="email" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<!-- /.col -->
				<div class="col-xs-4 pull-right">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
	</div>
</div>
<?php
	if ($this->session->flashdata('success')) {
?>
<div class="text-center">
	<div class="alert alert-success navbar-fixed-bottom" role="alert">
		<p style="font-size: 15px;"><?php echo $this->session->flashdata('success'); ?></p>
	</div>
	<?php
		}
		if ($this->session->flashdata('danger')) { ?>
			<div class="text-center">
				<div class="alert alert-danger navbar-fixed-bottom" role="alert">
					<p style="font-size: 15px;"><?php echo $this->session->flashdata('danger'); ?></p>
				</div>
			</div>
		<?php } ?>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/adminLte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/adminLte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/adminLte/plugins/iCheck/icheck.min.js"></script>
<script>
	setTimeout(function () {
		$('.alert').hide('fast');
	}, 3000);

	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});
</script>
</body>
</html>
