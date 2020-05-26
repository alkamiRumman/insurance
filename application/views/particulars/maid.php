<div class="row" id="list">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Maid Insurance List</h3>
				<a class="btn btn-primary pull-right" href="#add">Add New</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box">
				<div class="box-body">
					<table id="item-list" class="table table-bordered table-striped table-hover" style="width: 100%">
						<thead>
						<tr>
							<th>NRIC/FIN</th>
							<th>Name</th>
							<th>Contact No</th>
							<th>Email</th>
							<th>Address</th>
							<th>Service</th>
							<th style="padding: 0 40px">Action</th>
						</tr>
						</thead>
						<tbody>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row" id="add">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add New Personal Maid Insurance </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" enctype="multipart/form-data" action="<?= particulars_url('saveMaid') ?>">
				<div class="box-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="name">Employer Name</label>
								<input type="text" class="form-control" id="name" name="name"
									   placeholder="Enter Employer Name" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="contact">Contact Number</label>
								<input type="number" class="form-control" id="contact" name="contact"
									   placeholder="Employer Contact Number" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email"
									   placeholder="Employer Email"
									   required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" id="address" name="address"
									   placeholder="Employer Address"
									   required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="nric">NRIC/FIN No</label>
								<input type="text" class="form-control" id="nric" name="nric"
									   placeholder="NRIC/FIN No"
									   required>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="service">Service</label>
								<select class="form-control" name="service" id="service" required>
									<option value="">Select Service</option>
									<option value="Elderly">Elderly</option>
									<option value="Children">Children</option>
									<option value="General Housework">General Housework</option>
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
						<div class="repeat">
							<div class="repeatBox0">
								<div class="col-md-4">
									<div class="form-check form-check-inline">
										<label for="maidName">Name</label>
										<input type="text" class="form-control" id="maidName" name="maidName[]"
											   placeholder="Maid Name" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="citizenship">Citizenship</label>
										<input type="text" class="form-control" id="citizenship" name="citizenship[]"
											   placeholder="Citizenship" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="dob">Date of Birth</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" name="dob[]"
												   id="dob" placeholder="Maid Birthday" required>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="maidAddress">Address</label>
										<input type="text" class="form-control" id="maidAddress" name="maidAddress[]"
											   placeholder="Home Address" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="emergencyContact">Emergency Contact Person</label>
										<input type="text" class="form-control" id="emergencyContact"
											   name="emergencyContact[]"
											   placeholder="Emergency Contact Person" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="passport">Passport No</label>
										<input type="text" class="form-control" id="passport" name="passport[]"
											   placeholder="Passport No" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="workPermit">Work Permit Number</label>
										<input type="text" class="form-control" id="workPermit" name="workPermit[]"
											   placeholder="Work Permit Number" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coveragePeriod">Coverage Period</label>
										<input type="number" class="form-control" id="coveragePeriod"
											   name="coveragePeriod[]"
											   placeholder="No of Year" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="permitType">Work Permit Type</label>
										<select class="form-control" name="permitType[]" id="permitType" required>
											<option value="">Select Permit Type</option>
											<option value="New">New</option>
											<option value="Transfer">Transfer</option>
											<option value="Renewal">Renewal</option>
										</select>
									</div>
								</div>

								<div class="col-md-11">
									<hr>
								</div>
								<div class="remove">
									<div class="col-md-1">
								<span class="pull-right text-danger" id="0" onclick="deleteRepeat(this)"><i
											class="fa fa-close fa-2x"></i></span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="remarks">Remarks</label>
								<textarea class="form-control" id="remarks" name="remarks" rows="5"></textarea>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="file">Attachment of documents</label>
								<input type="file" id="file" name="file">
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<style>
	h4.cover {
		font-family: monospace;
		border-bottom: 2px solid #0b3e6f;
		background: #3c8dbc;
		padding: 5px 8px;
		color: #fff;
		font-weight: 900;
	}

</style>

<script type="text/javascript">
	var id_count;
	function deleteRepeat(elem) {
		var v = $('.repeat').children('div').length;
		if ((v - 1) === 1) {
			$('.remove').hide();
		}
		id_count -= 1;
		id_count--;
		var id = $(elem).attr("id");
		console.log(id);
		$('.repeatBox' + id).remove();
	}

	$(function () {
		$('#dob').datepicker({
			autoclose: true,
			todayHighlight: true,
			format: 'd M yyyy'
		});

		var id_count = 1;
		$('.remove').hide();
		$('.add').on('click', function () {
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
			if (id_count < 10) {
				$('.repeat').append(repeat);
				$('.remove').show();
				$('#dob' + id_count).datepicker({
					autoclose: true,
					todayHighlight: true,
					format: 'd M yyyy'
				});
				if (id_count === 10) {
					alert("Maximum ten can be added!");
				}
				if (id_count === 0) {
					$('.remove').hide();
				}
				if (id_count > 1) {
					$('.remove').show();
				}
			}
			id_count++;
		});

		$('.claimBox, .perClaimBox').hide();
		$('#checkClaim').on('click', function () {
			if ($('#checkClaim').is(":checked")) {
				$('.claimBox, .perClaimBox').show();
			} else {
				$('.claimBox, .perClaimBox').hide();
			}
		});
		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			"ajax": {
				url: "<?= particulars_url('get_maid') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null, null, null, null,
				{
					"bSortable": false
				}
			]
		});
	});
</script>
