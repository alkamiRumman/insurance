<div class="modal fade" id="remoteModal1" role="dialog" aria-hidden="true" data-backdrop="static"
     data-keyboard="false" style="z-index: 999999"></div>

</section>
</div>
</body>
</html>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$(function () {
		// this will get the full URL at the address bar
		var url = window.location.href;

		// passes on every "a" tag
		$(".sideMenu a").each(function () {
			// checks if its the same on the address bar
			if (url == (this.href)) {
				$(this).closest("li").addClass("active");
			}
		});
	});
	setTimeout(function () {
		$('.alert').hide('fast');
	}, 3000);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/adminLte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script
	src="<?= base_url('assets/adminLte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script
	src="<?= base_url('assets/adminLte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<script
	src="<?= base_url('assets/adminLte/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>
<script
	src="<?= base_url('assets/adminLte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('assets/adminLte/dist/js/demo.js') ?>"></script>


</body>
</html>
