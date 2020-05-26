<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b>Update Others Policy Details</b></h4>
			</div>
			<div class="modal-body">
				<form role="form" action="<?= type_url('updateOthers/' . $others->id) ?>" method="post"
					  enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nric">NRIC/FIN No</label>
									<input class="form-control" name="nric" id="nric" value="<?= $others->name . ' - ' . $others->nric ?>" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="type">Type of Policy</label>
									<select class="form-control type" name="type" id="type" required>
										<?php $v = json_decode($others->ctType);
											foreach ($v->type as $row) { ?>
												<option <?= $others->type == $row ? 'selected' : '' ?>
														value="<?= $row ?>"><?= $row ?></option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="discount"> Policy Number </label>
									<input type="number" class="form-control discount" name="discount" id="discount" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="companyId">Company Name</label>
									<select class="form-control" id="companyId" name="companyId" required>
										<option value="">Select Company</option>
										<?php foreach ($companies as $company) { ?>
											<option
													value="<?= $company->id ?>" <?= $company->id == $others->companyId ? 'selected' : '' ?>>
												<?= $company->name . ' - ' . $company->code ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="policyNumber"> Policy Number </label>
									<input type="text" class="form-control" id="policyNumber" name="policyNumber"
										   value="<?= $others->policyNo ?>" required>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="premiumPaid">Premium Paid</label>
									<input type="text" class="form-control" id="premiumPaid" name="premiumPaid"
										   value="<?= $others->premiumPaid ?>" required>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="startDate">Start Date</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" name="startDate"
											   id="startDate" value="<?= $others->startDate ?>">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="expireDate">Expiry Date</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" name="expireDate"
											   id="expireDate" value="<?= $others->expireDate ?>">
									</div>
								</div>
							</div>

						</div>

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('#startDate, #expireDate').datepicker({
			autoclose: true,
			todayHighlight: true,
			changeMonth: true,
			changeYear: true,
			format: 'd M yyyy'
		});

		var startDate = $('#startDate').val();
		var expireDate = $('#expireDate').val();
		$('#startDate').datepicker().datepicker("setDate", new Date(startDate));
		$('#expireDate').datepicker().datepicker("setDate", new Date(expireDate));

		var type = $('.type option:selected').text();
		var cData = JSON.parse(`<?php echo $others->ctType; ?>`);
		var index = cData.type.indexOf(type);
		$('.discount').val(cData.discount[index]);

		$('.type').on('change', function () {
			var type = $(this).val();
			var index = cData.type.indexOf(type);
			$('.discount').val(cData.discount[index]);
			console.log(cData.discount[index]);
		})
	})
</script>
