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
					<table id="item-list" class="table table-bordered table-striped table-hover" style="width:100%">
						<thead>
						<tr>
							<th>NRIC/FIN</th>
							<th>Name</th>
							<!--									<th>Contact No</th>-->
							<!--									<th>Email</th>-->
							<th>Date of Birth</th>
							<th>Occupation</th>
							<th>Driving Experiences</th>
							<th>NCD</th>
							<th>Year</th>
							<th>Claims</th>
							<th>Per Claim</th>
							<!--							<th>Discount</th>-->
							<th style="padding: 0 40px">Action</th>
						</tr>
						</thead>
						<tbody>


						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.box -->
		<!-- general form elements disabled -->

	</div>
	<!--/.col (right) -->
</div>
<div class="row" id="add">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add New Motor Insurance </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" enctype="multipart/form-data" action="<?= particulars_url('saveMotor') ?>">
				<div class="box-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="name">Policy Holder Name</label>
								<input type="text" class="form-control" id="name" name="name"
									   placeholder="Enter Policy Holder Name" required>
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
										   placeholder="Birthday" required>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="occupation">Occupation</label>
								<input type="text" class="form-control" id="occupation" name="occupation"
									   placeholder="Occupation"
									   required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="nric">NRIC/FIN No</label>
								<input type="text" class="form-control" id="nric" name="nric"
									   placeholder="NRIC/FIN No"
									   required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="experiences">Driving Experiences</label>
								<input type="number" class="form-control" id="experiences" name="experiences"
									   placeholder="How many Years"
									   required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="ncd">NCD</label>
								<input type="number" class="form-control" id="ncd" name="ncd"
									   placeholder="%"
									   required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="year">Year</label>
								<input type="number" class="form-control" id="year" name="year"
									   placeholder="Year"
									   required>
							</div>
						</div>
						<div class="col-md-2" style="padding-top: 20px">
							<div class="form-check form-check-inline">
								<input type="checkbox" class="form-check-input"
									   name="checkClaim" id="checkClaim">
								<label for="checkClaim">Any claim in past 3 years?</label>
							</div>
						</div>
						<div class="col-md-3 claimBox">
							<div class="form-group">
								<label for="claim">Claims</label>
								<input type="number" class="form-control" id="claim" name="claim"
									   placeholder="How Many Claims">
							</div>
						</div>
						<div class="col-md-3 perClaimBox">
							<div class="form-group">
								<label for="perClaims">Per Claims</label>
								<input type="number" class="form-control" id="perClaims" name="perClaims"
									   placeholder="How much per claim">
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
						<div class="repeat">
							<div class="repeatBox0">
								<div class="col-md-3">
									<div class="form-group">
										<label for="driver">Driver Name</label>
										<input type="text" class="form-control" id="driver" name="driver[]"
											   placeholder="Driver Name" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="vehicleNo">Vehicle No</label>
										<input type="text" class="form-control" id="vehicleNo" name="vehicleNo[]"
											   placeholder="Vehicle No" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="vehicleMake">Vehicle Make</label>
										<input type="text" class="form-control" id="vehicleMake" name="vehicleMake[]"
											   placeholder="Vehicle Make" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="vehicleModel">Vehicle Model</label>
										<input type="text" class="form-control" id="vehicleModel" name="vehicleModel[]"
											   placeholder="Vehicle Model" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="registrationDate">Registration Date</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" name="registrationDate[]"
												   placeholder="Vehicle Registration Date" id="registrationDate" required>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="engine">Engine CC</label>
										<input type="number" class="form-control" id="engine" name="engine[]"
											   placeholder="Engine CC" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="currentInsurer">Current Insurer</label>
										<input type="text" class="form-control" id="currentInsurer" name="currentInsurer[]"
											   placeholder="Current Insurer Company" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="expireDate">Current Policy Expiry Date</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" name="expireDate[]"
												   placeholder="Expire Date" id="expireDate" required>
										</div>
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
		$('#dob, #registrationDate, #expireDate').datepicker({
			autoclose: true,
			todayHighlight: true,
			changeMonth: true,
			changeYear: true,
			format: 'd M yyyy'
		});

		var id_count = 1;
		$('.remove').hide();
		$('.add').on('click', function () {
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
			if (id_count < 5) {
				$('.repeat').append(repeat);
				$('.remove').show();
				$('#registrationDate' + id_count + ', #expireDate' + id_count).datepicker({
					autoclose: true,
					todayHighlight: true,
					changeMonth: true,
					changeYear: true,
					format: 'd M yyyy'
				});
			}
			if (id_count === 5) {
				alert("Maximum five can be added!");
			}
			if (id_count === 0) {
				$('.remove').hide();
			}
			if (id_count > 1) {
				$('.remove').show();
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
				url: "<?= particulars_url('get_motor') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null, null,
				{
					"mRender": function (data, type, row) {
						return data + ' year';
					}
				},
				{
					"mRender": function (data, type, row) {
						return data + ' %';
					}
				}, null, null, null,
				{
					"bSortable": false
				}
			]
		});
	});
</script>
