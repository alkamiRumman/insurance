<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">
		<!-- Logo -->
		<a href="<?= dashboard_url('index') ?>" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b><?= SHORTNAME ?></b></span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Admin </b><?= SHORTNAME ?></span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">

					<!-- Messages: style can be found in dropdown.less-->
					<li class="dropdown messages-menu">
						<a href="<?= dashboard_url('index') ?>" class="dropdown-toggle" data-toggle="dropdown">
							<b><?= COMPANY ?></b>
						</a>
					</li>
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?= base_url('assets/adminLte/dist/img/noImage.png') ?>" class="user-image"
							     alt="User Image">
							<span class="hidden-xs">Alexander Pierce</span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img src="<?= base_url('assets/adminLte/dist/img/noImage.png') ?>" class="img-circle"
								     alt="User Image">
								<p>
									Alexander Pierce - Web Developer
									<small>Member since Nov. 2012</small>
								</p>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="<?= login_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?= base_url('assets/adminLte/dist/img/noImage.png') ?>" class="img-circle"
					     alt="User Image">
				</div>
				<div class="pull-left info">
					<p>Alexander Pierce</p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
				</div>
			</form>
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<div class="sideMenu">
				<ul class="sidebar-menu" data-widget="tree">
					<li>
						<a href="<?= dashboard_url('index') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="<?= company_url('index') ?>"><i class="fa fa-laptop"></i>
							<span>Insurance Company</span>
						</a>
					</li>
					<li class="treeview">
						<a href="treeview-menu">
							<i class="fa fa-table"></i>
							<span>Policy Holder Particulars</span>
							<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= particulars_url('index') ?>"><i class="fa fa-circle-o"></i> Corporate
									Policy
									Holder
								</a></li>
							<li><a href="<?= particulars_url('motor') ?>"><i class="fa fa-circle-o"></i> Motor Insurance
								</a></li>
							<li><a href="<?= particulars_url('maid') ?>"><i class="fa fa-circle-o"></i> Maid Insurance
								</a>
							</li>
							<li><a href="<?= particulars_url('others') ?>"><i class="fa fa-circle-o"></i> Others </a>
							</li>
						</ul>
					</li>
					<li class="treeview">
						<a href="treeview-menu">
							<i class="fa fa-address-book"></i>
							<span>Insurance Type</span>
							<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= type_url('index') ?>"><i class="fa fa-circle-o"></i> Corporate Insurance
								</a></li>
							<li><a href="<?= type_url('motor') ?>"><i class="fa fa-circle-o"></i> Motor Insurance </a>
							</li>
							<li><a href="<?= type_url('maid') ?>"><i class="fa fa-circle-o"></i> Maid Insurance </a>
							</li>
							<li><a href="<?= type_url('others') ?>"><i class="fa fa-circle-o"></i> Others </a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="treeview-menu">
							<i class="fa fa-folder"></i>
							<span>Reports</span>
							<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
						</a>
						<ul class="treeview-menu">
							<li><a href="#"><i class="fa fa-circle-o"></i> Report 2	</a></li>
							<li><a href="#"><i class="fa fa-circle-o"></i> Report 1 </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<section class="content">
			<?php
				if ($this->session->flashdata('success')) {
					?>
					<div class="text-center alert alert-success" role="alert">
						<p style="font-size: 20px">
							<?php echo $this->session->flashdata('success'); ?></p>
					</div>
					<?php
				}
				if ($this->session->flashdata('danger')) {
					?>
					<div class="alert alert-danger text-center" role="alert">
						<p style="font-size: 20px">
							<?php echo $this->session->flashdata('danger'); ?></p>
					</div>
				<?php } ?>

			<script>
				$(function () {
					var url = window.location;
					// Will only work if string in href matches with location
					$('.treeview-menu li a[href="' + url + '"]').parent().addClass('active');
					// Will also work for relative and absolute hrefs
					$('.treeview-menu li a').filter(function() {
						return this.href == url;
					}).parent().parent().parent().addClass('active', 'text-danger');
				});
			</script>
