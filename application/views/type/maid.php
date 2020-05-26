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
							<th>Name of Maid</th>
							<th>Insurer Company</th>
							<th>Policy Number</th>
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
				<h3 class="box-title">Personal Maid Insurance </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<form role="form" method="post" enctype="multipart/form-data"
				      action="<?= type_url('saveMaid') ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nric">NRIC/FIN No</label>
								<select class="form-control select2" name="nric" required></select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="maidName">Name of Maid</label>
								<select class="form-control" name="maidName" id="maidName">
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
						<h3 class="box-title">Employee's Information</h3>
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
									<label for="contact">Contact No</label>
								</div>
								<div class="col-md-6">
									<p id="contact"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="email">Email Address</label>
								</div>
								<div class="col-md-6">
									<p id="email"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="address">Address</label>
								</div>
								<div class="col-md-6">
									<p id="address"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="service">Service</label>
								</div>
								<div class="col-md-6">
									<p id="service"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="row maid">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Maid's Information</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-md-5">
									<label for="maidName">Name</label>
								</div>
								<div class="col-md-6">
									<p id="maidName"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="citizenship">Citizenship</label>
								</div>
								<div class="col-md-6">
									<p id="citizenship"></p>
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
									<label for="maidAddress">Address</label>
								</div>
								<div class="col-md-6">
									<p id="maidAddress"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="emergencyContact">Emergency Contact Person</label>
								</div>
								<div class="col-md-6">
									<p id="emergencyContact"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="passport">Passport No</label>
								</div>
								<div class="col-md-6">
									<p id="passport"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="workPermit">Work Permit Number</label>
								</div>
								<div class="col-md-6">
									<p id="workPermit"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="coveragePeriod">Coverage Period</label>
								</div>
								<div class="col-md-6">
									<p id="coveragePeriod"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="permitType">Work Permit Type</label>
								</div>
								<div class="col-md-6">
									<p id="permitType"></p>
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
		$('#maidName').prop('disabled', true);
		$('.personal').hide();
		$('.maid').hide();

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
			templateResult: formatCustom,
			templateSelection: selection,
			placeholder: "Select One",
			ajax: {
				url: '<?= type_url("getMaid") ?>',
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
			console.log(event);
			$('#maidName').prop('disabled', false);
			$('.personal').show();
			var data = event.params.data.maidInfo;
			var json = $.parseJSON(data);
			console.log(json);
			var i = 0;
			$('#maidName').empty();
			$('.maid').hide();
			$('#maidName').append('<option value="">Select One</option>');
			for (i; i < json.maidName.length; i++) {
				$('#maidName').append('<option value="' + json.maidName[i] + '">' + json.maidName[i] + '' +
					'</option>');
			}
			$('p#name').html(event.params.data.name);
			$('p#contact').html(event.params.data.contact);
			$('p#email').html(event.params.data.email);
			$('p#address').html(event.params.data.address);
			$('p#service').html(event.params.data.service);

			$('#maidName').on('click', function () {
				var v = $('#maidName').val();
				if (v != ''){
					$('.maid').show();
				}else {
					$('.maid').hide();
				}
				console.log(v);
				var index = json.maidName.indexOf(v);
				$('p#maidName').html(json.maidName[index]);
				$('p#citizenship').html(json.citizenship[index]);
				$('p#dob').html(json.dob[index]);
				$('p#maidAddress').html(json.maidAddress[index]);
				$('p#emergencyContact').html(json.emergencyContact[index]);
				$('p#passport').html(json.passport[index]);
				$('p#workPermit').html(json.workPermit[index]);
				$('p#coveragePeriod').html(json.coveragePeriod[index]+' months');
				$('p#permitType').html(json.permitType[index]);
			});

		});

		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			"ajax": {
				url: "<?= type_url('get_maid') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null, null, null, null, null, null,
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
