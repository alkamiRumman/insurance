<div class="row" id="list">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Corporate Insurance List</h3>
				<a class="btn btn-primary pull-right" href="#add">Add New</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box">
				<div class="box-body">
					<table id="item-list" class="table table-bordered table-striped table-hover" style="width: 100%">
						<thead>
						<tr>
							<th>Company Name</th>
							<th>UEN Number</th>
							<th>Type of Policy</th>
							<th>Discount</th>
							<th>Insurer Company</th>
							<th>Policy Number</th>
							<th>Start Date</th>
							<th>Expiry Date</th>
							<th>Premium Paid</th>
							<th>Action</th>
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
				<h3 class="box-title">Corporate Insurance </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<form role="form" method="post" enctype="multipart/form-data"
					  action="<?= type_url('save') ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="une">Maid Name & UEN Number</label>
								<select id="une" class="form-control select2" name="une" required></select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="type">Type of Policy</label>
								<select class="form-control type" name="type" id="type" required></select>
							</div>
						</div>
						<input type="hidden" name="discount" id="discount">
						<div class="col-md-6">
							<div class="form-group">
								<label for="companyID">Insurer Company</label>
								<select class="form-control" id="companyID" name="companyID" required>
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
										   id="startDate" placeholder="Start Date" required>
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
										   id="expireDate" placeholder="Expire Date" required>
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
						<h3 class="box-title">Company's Information</h3>
					</div>
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-md-5">
									<label for="company">Company Name</label>
								</div>
								<div class="col-md-6">
									<p id="company"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="contactPerson">Contact Person</label>
								</div>
								<div class="col-md-6">
									<p id="contactPerson"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="typeOfBusiness">Type of Business</label>
								</div>
								<div class="col-md-6">
									<p id="typeOfBusiness"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="employees">Number of Employees</label>
								</div>
								<div class="col-md-6">
									<p id="employees"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="email">Email</label>
								</div>
								<div class="col-md-6">
									<p id="email"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="mobile">Mobile Number</label>
								</div>
								<div class="col-md-6">
									<p id="mobile"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<label for="tel">Office Tel</label>
								</div>
								<div class="col-md-6">
									<p id="tel"></p>
								</div>
							</div>
							<div class="row discount">
								<div class="col-md-5">
									<label for="discount">Discount</label>
								</div>
								<div class="col-md-6">
									<p id="discount"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		$('#type').prop('disabled', true);
		$('#maidName').prop('disabled', true);
		$('.personal').hide();
		$('.discount').hide();

		function formatCustom(data) {
			// console.log(data);
			return data.company + ' - ' + data.uen;
		}

		function selection(data) {
			// console.log(data);
			if (data.id === '') {
				return data.text;
			} else {
				return data.company + ' - ' + data.uen;
			}
		}

		$(".select2").select2({
			placeholder: "Select One",
			templateResult: formatCustom,
			templateSelection: selection,
			ajax: {
				url: '<?= type_url("getPolicy") ?>',
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
			$('#type').prop('disabled', false);
			console.log(event);
			$('.personal').show();
			var data = event.params.data.type;
			// console.log(data.type);
			var json = $.parseJSON(data);
			// console.log(json);
			var i = 0;
			$('#type').empty();
			$('.discount').hide();
			$('#type').append('<option value="">Select One</option>');
			for (i; i < json.type.length; i++) {
				$('#type').append('<option value="' + json.type[i] + '">' + json.type[i] + '' +
						'</option>');
			}
			$('#type').on('click', function () {
				var v = $('#type').val();
				if (v != '') {
					$('.discount').show();
				} else {
					$('.discount').hide();
				}
				var index = json.type.indexOf(v);
				$('p#discount').html(json.discount[index] + ' %');
				$('#discount').val(json.discount[index]);
			});
			$('p#company').html(event.params.data.company);
			$('p#typeOfBusiness').html(event.params.data.typeOfBusiness);
			$('p#email').html(event.params.data.email);
			$('p#employees').html(event.params.data.employees);
			$('p#contactPerson').html(event.params.data.contactPerson);
			$('p#tel').html(event.params.data.tel);
			$('p#mobile').html(event.params.data.mobile);
			$('p#address').html(event.params.data.address);
		});

		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			"ajax": {
				url: "<?= type_url('get_policy') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null,
				{
					"mRender": function (data, type, row) {
						return data + ' %';
					}
				},
				null, null, null, null,null,
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
