<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b>Update Motor Policy Details</b></h4>
			</div>
			<div class="modal-body">
				<form role="form" action="<?= particulars_url('updateMotor/' . $motor->id) ?>" method="post"
					  enctype="multipart/form-data" novalidate>
					<div class="box-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="name">Policy Holder Name</label>
									<input type="text" class="form-control" id="name" name="name"
										   value="<?= $motor->name ?>" required>
								</div>
							</div>
							<!--						<div class="col-md-4">-->
							<!--							<div class="form-group">-->
							<!--								<label for="contact">Policy Holder Contact No</label>-->
							<!--								<input type="number" class="form-control" id="contact" name="contact"-->
							<!--								       placeholder="Contact Number" required>-->
							<!--							</div>-->
							<!--						</div>-->
							<!--						<div class="col-md-3">-->
							<!--							<div class="form-group">-->
							<!--								<label for="email">Policy Holder Email</label>-->
							<!--								<input type="email" class="form-control" id="email" name="email"-->
							<!--								       placeholder="Email Address"-->
							<!--								       required>-->
							<!--							</div>-->
							<!--						</div>-->
							<div class="col-md-4">
								<div class="form-group">
									<label>Date of Birth:</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" name="dob" id="dob"
											   value="<?= $motor->dob ?>" required>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="occupation">Occupation</label>
									<input type="text" class="form-control" id="occupation" name="occupation"
										   value="<?= $motor->occupation ?>"
										   required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="nric">NRIC/FIN No</label>
									<input type="text" class="form-control" id="nric" name="nric"
										   value="<?= $motor->nric ?>"
										   required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="experiences">Driving Experiences</label>
									<input type="number" class="form-control" id="experiences" name="experiences"
										   value="<?= $motor->experiences ?>"
										   required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label for="ncd">NCD</label>
									<input type="number" class="form-control" id="ncd" name="ncd"
										   value="<?= $motor->ncd ?>"
										   required>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="year">Year</label>
									<input type="number" class="form-control" id="year" name="year"
										   value="<?= $motor->year ?>"
										   required>
								</div>
							</div>
							<div class="col-md-3 claimBox">
								<div class="form-group">
									<label for="claim">Claims</label>
									<input type="number" class="form-control" id="claim" name="claim"
										   value="<?= $motor->claims ?>">
								</div>
							</div>
							<div class="col-md-3 perClaimBox">
								<div class="form-group">
									<label for="perClaims">Per Claims</label>
									<input type="number" class="form-control" id="perClaims" name="perClaims"
										   value="<?= $motor->perClaims ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h4 class="cover">
									Vehicle Information
									<span class="pull-right add"><i class="fa fa-plus"></i></span>
								</h4>
							</div>
						</div>

						<div class="row">
							<div class="repeatBoxEdit"></div>
						</div>

						<!--						<div class="row remove" style="display: none">-->
						<!--							<div class="col-md-12">-->
						<!--								<span class="pull-right text-danger remove"><i class="fa fa-close fa-2x"></i></span>-->
						<!--							</div>-->
						<!--						</div>-->

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="remarks">Remarks</label>
									<textarea class="form-control" id="remarks" name="remarks" rows="5"><?= $motor->remark ?>
									</textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="file">Attachment of documents</label>
									<input type="file" id="file" name="file">
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var id_count;
	var i = 0;
	$(function () {
		$('#dob, #registrationDate, #expireDate').datepicker({
			autoclose: true,
			todayHighlight: true,
			changeMonth: true,
			changeYear: true,
			format: 'd M yyyy'
		});

		var date = $('#dob').val();
		$('#dob').datepicker().datepicker("setDate", new Date(date));

		var cData = JSON.parse('<?php echo $motor->vehicleInfo; ?>');
		for (i; i < cData.driver.length; i++) {
			var html = '<div class="repeatBox' + i + '">' +
					'<div class="col-md-3">' +
					'<div class="form-check form-check-inline">' +
					'<label for="checkDriver">Driver Name</label>' +
					'<input type="text" class="form-control" id="driver' + i + '" name="driver[]"' +
					'value="' + cData.driver[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="vehicleNo">Vehicle No</label>' +
					'<input type="text" class="form-control" id="vehicleNo' + i + '" name="vehicleNo[]"' +
					'value="' + cData.vehicleNo[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="vehicleMake">Vehicle Make</label>' +
					'<input type="text" class="form-control" id="vehicleMake' + i + '" name="vehicleMake[]"' +
					'value="' + cData.vehicleMake[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="vehicleModel">Vehicle Model</label>' +
					'<input type="text" class="form-control" id="vehicleModel' + i + '" name="vehicleModel[]"' +
					'value="' + cData.vehicleModel[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="registrationDate">Registration Date</label>' +
					'<div class="input-group date">' +
					'<div class="input-group-addon">' +
					'<i class="fa fa-calendar"></i>' +
					'</div>' +
					'<input type="text" class="form-control pull-right" name="registrationDate[]"' +
					'value="' + cData.registrationDate[i] + '" id="registrationDate' + i + '" required>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="engine">Engine CC</label>' +
					'<input type="number" class="form-control" id="engine' + i + '" name="engine[]"' +
					'value="' + cData.engine[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="currentInsurer">Current Insurer</label>' +
					'<input type="text" class="form-control" id="currentInsurer' + i + '" name="currentInsurer[]"' +
					'value="' + cData.currentInsurer[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="expireDate">Current Policy Expiry Date</label>' +
					'<div class="input-group date">' +
					'<div class="input-group-addon">' +
					'<i class="fa fa-calendar"></i>' +
					'</div>' +
					'<input type="text" class="form-control pull-right" name="expireDate[]"' +
					'value="' + cData.expireDate[i] + '" id="expireDate' + i + '" required>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-11">' +
					'<hr>' +
					'</div>' +
					'<div class="remove">' +
					'<div class="col-md-1">' +
					'<span class="pull-right text-danger remove" id="' + i + '" onclick="deleteRepeat(this)"><i class="fa fa-close fa-2x"></i></span>' +
					'</div>' +
					'</div>' +
					'</div>'
			$('.repeatBoxEdit').append(html);
			$('#registrationDate' + i + ', #expireDate' + i).datepicker({
				autoclose: true,
				todayHighlight: true,
				changeMonth: true,
				changeYear: true,
				format: 'd M yyyy'
			});
		}
		var id_count = cData.driver.length;
		if (id_count === 1) {
			$('.remove').hide();
		}
		$('.add').on('click', function () {
			console.log(id_count);
			var repeat = '<div class="repeatBox' + id_count + '">' +
					'<div class="col-md-3">' +
					'<div class="form-check form-check-inline">' +
					'<label for="driver">Driver Name</label>' +
					'<input type="text" class="form-control" id="driver' + id_count + '" name="driver[]"' +
					'   placeholder="Driver Name" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="vehicleNo">Vehicle No</label>' +
					'<input type="text" class="form-control" id="vehicleNo' + id_count + '" name="vehicleNo[]"' +
					'   placeholder="Vehicle No" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="vehicleMake">Vehicle Make</label>' +
					'<input type="text" class="form-control" id="vehicleMake' + id_count + '" name="vehicleMake[]"' +
					'   placeholder="Vehicle Make" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="vehicleModel">Vehicle Model</label>' +
					'<input type="text" class="form-control" id="vehicleModel' + id_count + '" name="vehicleModel[]"' +
					'   placeholder="Vehicle Model" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="registrationDate">Registration Date</label>' +
					'<div class="input-group date">' +
					'<div class="input-group-addon">' +
					'<i class="fa fa-calendar"></i>' +
					'</div>' +
					'<input type="text" class="form-control pull-right" name="registrationDate[]"' +
					'   placeholder="Registration Date" id="registrationDate' + id_count + '" required>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="engine">Engine CC</label>' +
					'<input type="number" class="form-control" id="engine' + id_count + '" name="engine[]"' +
					'   placeholder="Engine CC" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="currentInsurer">Current Insurer</label>' +
					'<input type="text" class="form-control" id="currentInsurer' + id_count + '" name="currentInsurer[]"' +
					'   placeholder="Current Insurer Company" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-3">' +
					'<div class="form-group">' +
					'<label for="expireDate">Current Policy Expiry Date</label>' +
					'<div class="input-group date">' +
					'<div class="input-group-addon">' +
					'<i class="fa fa-calendar"></i>' +
					'</div>' +
					'<input type="text" class="form-control pull-right" name="expireDate[]"' +
					'   placeholder="Expire Date" id="expireDate' + id_count + '" required>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-11">' +
					'<hr>' +
					'</div>' +
					'<div class="remove">' +
					'<div class="col-md-1">' +
					'<span class="pull-right text-danger" id="' + id_count + '" onclick="deleteRepeat(this)"><i class="fa fa-close fa-2x"></i></span>' +
					'</div>' +
					'</div>' +
					'</div>'
			var v = $('.repeatBoxEdit').children('div').length;
			if (v < 5) {
				$('.repeatBoxEdit').append(repeat);
				$('.remove').show();
				$('#registrationDate' + id_count + ', #expireDate' + id_count).datepicker({
					autoclose: true,
					todayHighlight: true,
					changeMonth: true,
					changeYear: true,
					format: 'd M yyyy'
				});
			}
			if (v === 5) {
				alert("Maximum five can be added!");
			}
			if (v === 0) {
				$('.remove').hide();
			}
			id_count++;
		});
	});

	function deleteRepeat(elem) {
		var v = $('.repeatBoxEdit').children('div').length;
		if ((v - 1) === 1) {
			$('.remove').hide();
		}
		id_count -= 1;
		id_count--;
		var id = $(elem).attr("id");
		$('.repeatBox' + id).remove();
	}
</script>
