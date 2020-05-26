<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b>Update Maid Policy Details</b></h4>
			</div>
			<div class="modal-body">
				<form role="form" action="<?= particulars_url('updateMaid/' . $maid->id) ?>" method="post"
					  enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="name">Employer Name</label>
									<input type="text" class="form-control" id="name" name="name"
										   value="<?= $maid->name ?>" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="contact">Contact Number</label>
									<input type="number" class="form-control" id="contact" name="contact"
										   value="<?= $maid->contact ?>" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email"
										   value="<?= $maid->email ?>"
										   required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" class="form-control" id="address" name="address"
										   value="<?= $maid->address ?>"
										   required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="nric">NRIC/FIN No</label>
									<input type="text" class="form-control" id="nric" name="nric"
										   value="<?= $maid->nric ?>"
										   required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="service">Service</label>
									<select class="form-control" name="service" id="service" required>
										<option <?= $maid->service == 'Elderly' ? 'selected' : '' ?> value="Elderly">
											Elderly
										</option>
										<option <?= $maid->service == 'Children' ? 'selected' : '' ?> value="Children">
											Children
										</option>
										<option <?= $maid->service == 'General Housework' ? 'selected' : '' ?>
												value="General Housework">General Housework
										</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<h4 class="cover">
									Maid Information
									<span class="pull-right add"><i class="fa fa-plus"></i></span>
								</h4>
							</div>
						</div>

						<div class="row">
							<div class="repeatBoxEdit"></div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="remarks">Remarks</label>
									<textarea class="form-control text-left" id="remarks" name="remarks"
											  rows="5"><?= $maid->remark ?></textarea>
								</div>
							</div>
							<div class="col-lg-6">
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

		var cData = JSON.parse('<?php echo $maid->maidInfo; ?>');
		console.log(cData);
		for (i; i < cData.maidName.length; i++) {
			var html = '<div class="repeatBox' + i + '">' +
					'<div class="col-md-4">' +
					'<div class="form-check form-check-inline">' +
					'<label for="maidName">Name</label>' +
					'<input type="text" class="form-control" id="maidName" name="maidName[]"' +
					'value="' + cData.maidName[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="citizenship">Citizenship</label>' +
					'<input type="text" class="form-control" id="citizenship" name="citizenship[]"' +
					'value="' + cData.citizenship[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="dob">Date of Birth</label>' +
					'<div class="input-group date">' +
					'<div class="input-group-addon">' +
					'<i class="fa fa-calendar"></i>' +
					'</div>' +
					'<input type="text" class="form-control pull-right" name="dob[]"' +
					'   id="dob' + i + '" value="' + cData.dob[i] + '" required>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="maidAddress">Address</label>' +
					'<input type="text" class="form-control" id="maidAddress" name="maidAddress[]"' +
					'value="' + cData.maidAddress[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="emergencyContact">Emergency Contact Person</label>' +
					'<input type="text" class="form-control" id="emergencyContact"' +
					'name="emergencyContact[]"' +
					'value="' + cData.emergencyContact[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="passport">Passport No</label>' +
					'<input type="text" class="form-control" id="passport" name="passport[]"' +
					'value="' + cData.passport[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="workPermit">Work Permit Number</label>' +
					'<input type="text" class="form-control" id="workPermit" name="workPermit[]"' +
					'value="' + cData.workPermit[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="coveragePeriod">Coverage Period</label>' +
					'<input type="number" class="form-control" id="coveragePeriod"' +
					'   name="coveragePeriod[]"' +
					'value="' + cData.coveragePeriod[i] + '" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="permitType">Work Permit Type</label>' +
					'<select class="form-control" name="permitType[]" id="permitType" required>' +
					'<option class="text-bold text-success" value="' + cData.permitType[i] + '">' + cData.permitType[i] + '</option>' +
					'<option value="New">New</option>' +
					'<option value="Transfer">Transfer</option>' +
					'<option value="Renewal">Renewal</option>' +
					'</select>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-11">' +
					'<hr>' +
					'</div>' +
					'<div class="remove">' +
					'<div class="col-md-1">' +
					'<span class="pull-right text-danger" id="' + i + '" onclick="deleteRepeat(this)"><i class="fa fa-close fa-2x"></i></span>' +
					'</div>' +
					'</div>' +
					'</div>'
			$('.repeatBoxEdit').append(html);
			$('#dob' + i).datepicker({
				autoclose: true,
				todayHighlight: true,
				changeMonth: true,
				changeYear: true,
				format: 'd M yyyy'
			});
		}
		var id_count = cData.maidName.length;
		if (id_count === 1) {
			$('.remove').hide();
		}
		$('.add').on('click', function () {
			console.log(id_count);
			var repeat = '<div class="repeatBox' + id_count + '">' +
					'<div class="col-md-4">' +
					'<div class="form-check form-check-inline">' +
					'<label for="maidName">Name</label>' +
					'<input type="text" class="form-control" id="maidName" name="maidName[]"' +
					'   placeholder="Maid Name" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="citizenship">Citizenship</label>' +
					'<input type="text" class="form-control" id="citizenship" name="citizenship[]"' +
					'   placeholder="Citizenship" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="dob">Date of Birth</label>' +
					'<div class="input-group date">' +
					'<div class="input-group-addon">' +
					'<i class="fa fa-calendar"></i>' +
					'</div>' +
					'<input type="text" class="form-control pull-right" name="dob[]"' +
					'   id="dob' + id_count + '" placeholder="Maid Birthday" required>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="maidAddress">Address</label>' +
					'<input type="text" class="form-control" id="maidAddress" name="maidAddress[]"' +
					'   placeholder="Home Address" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="emergencyContact">Emergency Contact Person</label>' +
					'<input type="text" class="form-control" id="emergencyContact"' +
					'   name="emergencyContact[]"' +
					'   placeholder="Emergency Contact Person" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="passport">Passport No</label>' +
					'<input type="text" class="form-control" id="passport" name="passport[]"' +
					'   placeholder="Passport No" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="workPermit">Work Permit Number</label>' +
					'<input type="text" class="form-control" id="workPermit" name="workPermit[]"' +
					'   placeholder="Work Permit Number" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="coveragePeriod">Coverage Period</label>' +
					'<input type="number" class="form-control" id="coveragePeriod"' +
					'   name="coveragePeriod[]"' +
					'   placeholder="No of Year" required>' +
					'</div>' +
					'</div>' +
					'<div class="col-md-4">' +
					'<div class="form-group">' +
					'<label for="permitType">Work Permit Type</label>' +
					'<select class="form-control" name="permitType[]" id="permitType" required>' +
					'<option value="">Select Permit Type</option>' +
					'<option value="New">New</option>' +
					'<option value="Transfer">Transfer</option>' +
					'<option value="Renewal">Renewal</option>' +
					'</select>' +
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
			if (v < 10) {
				$('.repeatBoxEdit').append(repeat);
				$('.remove').show();
				$('#dob' + id_count).datepicker({
					autoclose: true,
					todayHighlight: true,
					changeMonth: true,
					changeYear: true,
					format: 'd M yyyy'
				});
			}
			if (v === 10) {
				alert("Maximum ten can be added!");
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
