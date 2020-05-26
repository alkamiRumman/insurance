<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b>Update Motor Policy Details</b></h4>
			</div>
			<div class="modal-body">
				<form role="form" action="<?= type_url('updateMotor/' . $motor->id) ?>" method="post"
					  enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nric">NRIC/FIN No</label>
									<input class="form-control" id="nric" name="nric" value="<?= $motor->name . ' - ' . $motor->nric ?>"
										   readonly>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="vehicleNo">Vehicle Plate No</label>
									<select class="form-control" name="vehicleNo" id="vehicleNo" required>
										<?php $v = json_decode($motor->vInfo);
											foreach ($v->vehicleNo as $row) { ?>
												<option <?= $motor->vehicleNo == $row ? 'selected' : '' ?>
														value="<?= $row ?>"><?= $row ?></option>
											<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="companyId">Company Name</label>
									<select class="form-control" id="companyId" name="companyId" required>
										<option value="">Select Company</option>
										<?php foreach ($companies as $company) { ?>
											<option
													value="<?= $company->id ?>" <?= $company->id == $motor->companyId ? 'selected' : '' ?>>
												<?= $company->name . ' - ' . $company->code ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="policyNumber"> Policy Number </label>
									<input type="text" class="form-control" id="policyNumber" name="policyNumber"
										   value="<?= $motor->policyNumber ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="type">Type</label>
									<select class="form-control" id="type" name="type" required>
										<option value="">Select Type</option>
										<option <?= $motor->type == 'Renew' ? 'selected' : '' ?> value="Renew">Renew
										</option>
										<option <?= $motor->type == 'New' ? 'selected' : '' ?> value="New">New</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="typeOfCoverage">Type of Coverage</label>
									<select class="form-control" id="typeOfCoverage" name="typeOfCoverage" required>
										<option value="">Select Type</option>
										<option <?= $motor->typeOfCoverage == 'Authorised Workshop' ? 'selected' : '' ?>
												value="Authorised Workshop">Comprehensive (Authorised Workshop)
										</option>
										<option <?= $motor->typeOfCoverage == 'Any Workshop' ? 'selected' : '' ?>
												value="Any Workshop">Comprehensive (Any Workshop)
										</option>
										<option <?= $motor->typeOfCoverage == 'Third Party' ? 'selected' : '' ?>
												value="Third Party">Third Party
										</option>
									</select>
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
											   id="startDate" value="<?= $motor->startDate ?>">
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
											   id="expireDate" value="<?= $motor->expireDate ?>">
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="premiumPaid">Premium Paid</label>
									<input type="text" class="form-control" id="premiumPaid" name="premiumPaid"
										   value="<?= $motor->premiumPaid ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="file">Attachment of documents</label>
									<input type="file" id="file" name="file">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="remarks">Remarks</label>
									<textarea class="form-control" id="remarks" name="remarks"
											  cols="3"><?= $motor->remark ?></textarea>
								</div>
							</div>
						</div>
						<!-- /.box-body -->

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
	})
</script>
