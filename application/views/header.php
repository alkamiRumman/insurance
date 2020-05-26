<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= SHORTNAME ?> | <?= $title ? $title : '' ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet"
	      href="<?= base_url('assets/adminLte/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet"
	      href="<?= base_url('assets/adminLte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet"
	      href="<?= base_url('assets/adminLte/bower_components/font-awesome/css/font-awesome.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('assets/adminLte/bower_components/Ionicons/css/ionicons.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/adminLte/dist/css/AdminLTE.min.css') ?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url('assets/adminLte/dist/css/skins/_all-skins.min.css') ?>">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?= base_url('assets/adminLte/bower_components/morris.js/morris.css') ?>">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?= base_url('assets/adminLte/bower_components/jvectormap/jquery-jvectormap.css') ?>">
	<!-- Date Picker -->
	<link rel="stylesheet"
	      href="<?= base_url('assets/adminLte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
	<link rel="stylesheet"
	      href="<?= base_url('assets/adminLte/bower_components/select2/dist/css/select2.min.css') ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet"
	      href="<?= base_url('assets/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet"
	      href="<?= base_url('assets/adminLte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">

	<!-- Google Font -->
	<link rel="stylesheet"
	      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="<?= base_url('assets/adminLte/bower_components/jquery/dist/jquery.min.js') ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url('assets/adminLte/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
</head>
