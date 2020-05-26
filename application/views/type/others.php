<div class="row" id="list">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Others Insurance List</h3>
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
							<th>Policy Type</th>
							<th>Discount</th>
							<th>Insurer Name</th>
							<th>Policy No</th>
							<th>Premium Paid</th>
							<th>Start Date</th>
							<th>Expire Date</th>
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
				<h3 class="box-title">Others Insurance </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<form role="form" method="post" enctype="multipart/form-data"
					  action="<?= type_url('saveOthers') ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nric">NRIC/FIN No</label>
								<select class="form-control select2" name="nric" required></select>
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
								<label for="companyId">Insurer Company</label>
								<select class="form-control" id="companyId" name="companyId" required>
									<option value="">Select Company</option>
									<?php foreach ($companies as $company) { ?>
										<option
												value="<?= $company->id ?>"><?= $company->code . ' ' . $company->name ?></option>
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
								<label for="premiumPaid">Premium Paid</label>
								<input type="text" class="form-control" id="premiumPaid" name="premiumPaid"
									   placeholder="Enter Premium Paid" required>
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

					</div>

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
									<label for="name"> Name</label>
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
		$('#type').prop('disabled', true);
		$('.personal').hide();
		$('.discount').hide();

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
				url: '<?= type_url("getOthers") ?>',
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
			$('p#name').html(event.params.data.name);
			$('p#contact').html(event.params.data.contact);
			$('p#email').html(event.params.data.email);
			$('p#address').html(event.params.data.address);
			$('p#discount').html(event.params.data.discount + ' %');

		});

		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			"ajax": {
				url: "<?= type_url('get_others') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null,
				{
					"mRender": function (data, type, row) {
						return data + ' %';
					}
				}, null, null, null, null, null,
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
