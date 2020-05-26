<div class="row" id="list">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Motor Insurance List</h3>
				<a class="btn btn-primary pull-right" href="#add">Add New</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box">
				<div class="box-body">
					<table id="item-list" class="table table-bordered table-striped table-hover" style="width: 100%">
						<thead>
						<tr>
							<th>Name</th>
							<th>NRIC/FIN</th>
							<th>vehicleNo</th>
							<th>Insurer Company</th>
							<th>Policy Number</th>
							<th>Type</th>
							<th>Type of Coverage</th>
							<th>Start Date</th>
							<th>Expire Date</th>
							<th>Premium Paid</th>
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
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Personal Motor Insurance </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<form role="form" method="post" enctype="multipart/form-data"
					  action="<?= type_url('saveMotor') ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nric">NRIC/FIN No</label>
								<select class="form-control select2" name="nric" required></select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="vehicleNo">Vehicle Plate No</label>
								<select class="form-control" name="vehicleNo" id="vehicleNo" required>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="companyId">Insurer Company</label>
								<select class="form-control" id="companyId" name="companyId" required>
									<option value="">Select Company</option>
									<?php foreach ($companies as $company) { ?>
										<option
												value="<?= $company->id ?>"><?= $company->name . ' - ' . $company->code ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="policyNumber"> Policy Number </label>
								<input type="text" class="form-control" id="policyNumber" name="policyNumber"
									   placeholder="Enter Policy Number" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="type">Type</label>
								<select class="form-control" id="type" name="type" required>
									<option value="">Select Type</option>
									<option value="Renew">Renew</option>
									<option value="New">New</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="typeOfCoverage">Type of Coverage</label>
								<select class="form-control" id="typeOfCoverage" name="typeOfCoverage" required>
									<option value="">Select Type</option>
									<option value="Authorised Workshop">Comprehensive (Authorised Workshop)</option>
									<option value="Any Workshop">Comprehensive (Any Workshop)</option>
									<option value="Third Party">Third Party</option>
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
										   id="startDate" placeholder="Start Date">
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
										   id="expireDate" placeholder="Expire Date">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="premiumPaid">Premium Paid</label>
								<input type="text" class="form-control" id="premiumPaid" name="premiumPaid"
									   placeholder="Enter Premium Paid" required>
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
								<textarea class="form-control" id="remarks" name="remarks" cols="3"></textarea>
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

	<div class="col-md-6">
		<div class="row personal">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Personal Information</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-md-5">
									<label for="name">Policy Holder Name</label>
								</div>
								<div class="col-md-6">
									<p id="name"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="dob">Date of Birth</label>
								</div>
								<div class="col-md-6">
									<p id="dob"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="occupation">Occupation</label>
								</div>
								<div class="col-md-6">
									<p id="occupation"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="experiences">Driving Experiences</label>
								</div>
								<div class="col-md-6">
									<p id="experiences"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label for="ncd">NCD</label>
								</div>
								<div class="col-md-2">
									<p id="ncd"></p>
								</div>
								<div class="col-md-3">
									<label for="year">Year</label>
								</div>
								<div class="col-md-1">
									<p id="year"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label for="claims">Claims</label>
								</div>
								<div class="col-md-2">
									<p id="claims"></p>
								</div>
								<div class="col-md-3">
									<label for="perClaims">Per Claims</label>
								</div>
								<div class="col-md-1">
									<p id="perClaims"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row vehicle">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Vehicle Information</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-md-5">
									<label for="driverName">Driver Name</label>
								</div>
								<div class="col-md-6">
									<p id="driverName"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="vehicleMake">Vehicle Make</label>
								</div>
								<div class="col-md-6">
									<p id="vehicleMake"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="vehicleModel">Vehicle Model</label>
								</div>
								<div class="col-md-6">
									<p id="vehicleModel"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="registrationDate">Registration Date</label>
								</div>
								<div class="col-md-6">
									<p id="registrationDate"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="engineCC">Engine CC</label>
								</div>
								<div class="col-md-6">
									<p id="engineCC"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="currentInsurer">Current Insurer</label>
								</div>
								<div class="col-md-6">
									<p id="currentInsurer"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="currentPolicyExpiryDate">Current Policy Expiry Date</label>
								</div>
								<div class="col-md-6">
									<p id="currentPolicyExpiryDate"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	$(function () {
		$('#vehicleNo').prop('disabled', true);
		$('.personal').hide();
		$('.vehicle').hide();

		function formatCustom(data) {
			// console.log(data);
			return data.name + ' - ' + data.nric;
		}

		function selection(data) {
			// console.log(data);
			if (data.id === '') {
				return data.text;
			} else {
				return data.name + ' - ' + data.nric;
			}
		}

		$(".select2").select2({
			// allowClear: true,
			templateResult: formatCustom,
			templateSelection: selection,
			placeholder: "Select One",
			ajax: {
				url: '<?= type_url("getMotor") ?>',
				dataType: 'json',
				type: "POST",
				quietMillis: 50,
				data: function (params) {
					console.log(params);
					return {
						searchTerm: params.term
					};
				},
				processResults: function (response) {
					return {
						results: response
					};
				}
			}
		}).on('select2:select', function (event) {
			$('#vehicleNo').prop('disabled', false);
			$('.personal').show();
			var data = event.params.data.vehicleInfo;
			var json = $.parseJSON(data);
			console.log(json);
			var i = 0;
			$('#vehicleNo').empty();
			$('.vehicle').hide();
			$('#vehicleNo').append('<option value="">Select One</option>');
			for (i; i < json.vehicleNo.length; i++) {
				$('#vehicleNo').append('<option value="' + json.vehicleNo[i] + '">' + json.vehicleNo[i] + '' +
						'</option>');
			}
			$('p#name').html(event.params.data.name);
			$('p#dob').html(event.params.data.dob);
			$('p#occupation').html(event.params.data.occupation);
			$('p#experiences').html(event.params.data.experiences);
			$('p#ncd').html(event.params.data.ncd);
			$('p#year').html(event.params.data.year);
			$('p#claims').html(event.params.data.claims);
			$('p#perClaims').html(event.params.data.perClaims);


			$('#vehicleNo').on('click', function () {
				var v = $('#vehicleNo').val();
				if (v != '') {
					$('.vehicle').show();
				} else {
					$('.vehicle').hide();
				}
				var index = json.vehicleNo.indexOf(v);
				$('p#driverName').html(json.driver[index]);
				$('p#vehicleMake').html(json.vehicleMake[index]);
				$('p#vehicleModel').html(json.vehicleModel[index]);
				$('p#registrationDate').html(json.registrationDate[index]);
				$('p#engineCC').html(json.engine[index]);
				$('p#currentInsurer').html(json.currentInsurer[index]);
				$('p#currentPolicyExpiryDate').html(json.expireDate[index]);
			});
		});

		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			"ajax": {
				url: "<?= type_url('get_motor') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null, null, null, null, null, null, null, null,
				{
					"bSortable": false
				}
			]
		});

		$('#startDate, #expireDate').datepicker({
			autoclose: true,
			todayHighlight: true,
			changeMonth: true,
			changeYear: true,
			format: 'd M yyyy'
		});
	});

</script>
