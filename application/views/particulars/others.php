<div class="row" id="list">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Policy List</h3>
				<a class="btn btn-primary pull-right" href="#add">Add New</a>
			</div>
			<div class="box">
				<div class="box-body">
					<table id="item-list" class="table table-bordered table-striped table-hover" style="width: 100%">
						<thead>
						<tr>
							<th>NRIC/FIN No</th>
							<th>Name</th>
							<th>Contact No</th>
							<th>Email</th>
							<th>Address</th>
							<th style="padding: 0 45px">Action</th>
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
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Other Policy </h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<form role="form" method="post" enctype="multipart/form-data" action="<?= particulars_url('saveOthers') ?>">
				<div class="box-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="nric">NRIC/FIN No</label>
								<input type="text" class="form-control" id="nric" name="nric"
								       placeholder="Enter NRIC/FIN No" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name"
								       placeholder="Policy Holder Name" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="contact">Contact No</label>
								<input type="number" class="form-control" max="11" id="contact" name="contact"
								       placeholder="Policy Holder Contact No" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="email">Email </label>
								<input type="email" class="form-control" id="email" name="email"
								       placeholder="Policy Holder Email" required>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" id="address" name="address"
								       placeholder="Address"
								       required>
							</div>
						</div>
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
								<div class="Others"></div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
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
					$('.health').html('<input type="number" name="discount[]" placeholder="Health Plan (%)">');
				}
				if (val == 'Property') {
					$('.property').html('<input type="number" name="discount[]" placeholder="Property (%)">');
				}
				if (val == 'WICA') {
					$('.WICA').html('<input type="number" name="discount[]" placeholder="WICA (%)">');
				}
				if (val == 'Personal Accident') {
					$('.Personal').html('<input type="number" name="discount[]" placeholder="Personal Accident (%)">');
				}
				if (val == 'Public Liability') {
					$('.Public').html('<input type="number" name="discount[]" placeholder="Public Liability (%)">');
				}
				if (val == 'Professional Liability') {
					$('.Professional').html('<input type="number" name="discount[]" placeholder="Professional Liability (%)">');
				}
				if (val == 'Travel') {
					$('.Travel').html('<input type="number" name="discount[]" placeholder="Travel (%)">');
				}
				if (val == 'Others') {
					$('.Others').html('<input type="number" name="discount[]" placeholder="Others (%)">');
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
				if (val == 'Others') {
					$('.Others').html('');
				}
			}
		});
	});
	$(function () {
		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			"ajax": {
				url: "<?= particulars_url('get_others') ?>",
				type: 'GET'
			},
			"aoColumns": [null, null, null, null, null,
				{
					"bSortable": false
				}
			]
		});
	});
</script>
