<div class="row" id="list">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Corporate Policy Holder List</h3>
				<a class="btn btn-primary pull-right" href="#add">Add New</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box">
				<div class="box-body">
					<table id="item-list"
						   class="table table-responsive table-bordered table-striped table-hover" style="width: 100%">
						<thead>
						<tr>
							<th>UEN</th>
							<th>Company Name</th>
							<th>Type of Business</th>
							<th>Number of Employees</th>
							<th>Contact Person</th>
							<th>Email</th>
							<th>Mobile</th>
<!--							<th>Insurer Name</th>-->
							<th style="padding: 0 45px">Action</th>
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
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add New Corporate Policy Holder </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" enctype="multipart/form-data" action="<?= particulars_url('save') ?>">
				<div class="box-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="uen"> UEN Number</label>
								<input type="text" class="form-control" id="uen" name="uen"
									   placeholder="Enter UEN Number" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="companyName">Company Name</label>
								<input type="text" class="form-control" id="companyName" name="companyName"
									   placeholder="Enter Company Name" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="typeOfBusiness">Type of Business</label>
								<input type="text" class="form-control" id="compantypeOfBusinessyName" name="typeOfBusiness"
									   placeholder="Enter Type of Businesse" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="contactPerson">Contact Person</label>
								<input type="text" class="form-control" id="contactPerson" name="contactPerson"
									   placeholder="Contact Person's Name"
									   required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="mobile">Mobile Number</label>
								<input type="number" class="form-control" id="mobile" name="mobile"
									   placeholder="Mobile Number"
									   required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="email">Email </label>
								<input type="email" class="form-control" id="email" name="email"
									   placeholder="Email Address" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="employees">Number of Employees</label>
								<input type="number" class="form-control" id="employees" name="employees"
									   placeholder="Number of Employees"
									   required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="tel">Office Tel</label>
								<input type="number" class="form-control" id="tel" name="tel"
									   placeholder="Office Telephone Number"
									   required>
							</div>
						</div>
<!--						<div class="col-md-4">-->
<!--							<div class="form-group">-->
<!--								<label for="companyID">Insurer Name </label>-->
<!--								<select class="form-control" id="companyID" name="companyID" required>-->
<!--									<option value="">Select Company</option>-->
<!--									--><?php //foreach ($companies as $company) { ?>
<!--										<option-->
<!--												value="--><?//= $company->id ?><!--">--><?//= $company->name . ' - ' . $company->code ?><!--</option>-->
<!--									--><?php //} ?>
<!--								</select>-->
<!--							</div>-->
<!--						</div>-->
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="remarks">Remarks</label>
								<textarea class="form-control" id="remarks" name="remarks" rows="5"></textarea>
							</div>

							<div class="form-group">
								<label for="file">Attachment of documents</label>
								<input type="file" id="file" name="file">
							</div>
						</div>
						<div class="col-md-2 types">
							<div class="form-group" style="margin-top: 0">
								<label for="type">Types of Policy</label>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Health Plan">Health Plan
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Property">Property
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="WICA">WICA
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Personal Accident">Personal
										Accident
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Public Liability">Public
										Liability
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Professional Liability">Professional
										Liability
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Travel">Travel
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Motor">Motor
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="type[]" value="Others">Others
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-3" style="padding-left: 0">
							<div class="form-group">
								<label for="discount">Corporate Discount</label>
								<div class="health"></div>
								<div class="property"></div>
								<div class="WICA"></div>
								<div class="Personal"></div>
								<div class="Public"></div>
								<div class="Professional"></div>
								<div class="Travel"></div>
								<div class="Motor"></div>
								<div class="Others"></div>
							</div>
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

<script type="text/javascript">
	$(document).ready(function () {
		$('input[type="checkbox"]').on('click', function () {
			if ($(this).prop("checked") == true) {
				var val = $(this).val();
				if (val == 'Health Plan') {
					$('.health').html('<input type="number" name="discount[]" placeholder="Health Plan (%)" required>');
				}
				if (val == 'Property') {
					$('.property').html('<input type="number" name="discount[]" placeholder="Property (%)" required>');
				}
				if (val == 'WICA') {
					$('.WICA').html('<input type="number" name="discount[]" placeholder="WICA (%)" required>');
				}
				if (val == 'Personal Accident') {
					$('.Personal').html('<input type="number" name="discount[]" placeholder="Personal Accident (%)" required>');
				}
				if (val == 'Public Liability') {
					$('.Public').html('<input type="number" name="discount[]" placeholder="Public Liability (%)" required>');
				}
				if (val == 'Professional Liability') {
					$('.Professional').html('<input type="number" name="discount[]" placeholder="Professional Liability (%)" required>');
				}
				if (val == 'Travel') {
					$('.Travel').html('<input type="number" name="discount[]" placeholder="Travel (%)" required>');
				}
				if (val == 'Motor') {
					$('.Motor').html('<input type="number" name="discount[]" placeholder="Motor (%)" required>');
				}
				if (val == 'Others') {
					$('.Others').html('<input type="number" name="discount[]" placeholder="Others (%)" required>');
				}
			}
			if ($(this).prop("checked") == false) {
				var val = $(this).val();
				if (val == 'Health Plan') {
					$('.health').html('');
				}
				if (val == 'Property') {
					$('.property').html('');
				}
				if (val == 'WICA') {
					$('.WICA').html('');
				}
				if (val == 'Personal Accident') {
					$('.Personal').html('');
				}
				if (val == 'Public Liability') {
					$('.Public').html('');
				}
				if (val == 'Professional Liability') {
					$('.Professional').html('');
				}
				if (val == 'Travel') {
					$('.Travel').html('');
				}
				if (val == 'Motor') {
					$('.Motor').html('');
				}
				if (val == 'Others') {
					$('.Others').html('');
				}
			}
		});
	});

	$(function () {
		$('button').on('click', function (event) {
			var v = $("input[type='checkbox']:checked").length;
			if (v === 0) {
				event.preventDefault();
				alert("Please Select Any Type First");
			}
		})
		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			scroller: true,
			"ajax": {
				url: "<?= particulars_url('get_policy') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null, null, null, null, null,
				{
					"bSortable": false
				}
			]
		});
	});
</script>
