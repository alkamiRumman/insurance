<div class="row" id="list">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Company List</h3>
				<a class="btn btn-primary pull-right" href="#add">Add New</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box">
				<div class="box-body">
					<table id="item-list" class="table table-responsive table-bordered table-striped table-hover"
						   style="width: 100%">
						<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Contact Name</th>
							<th>Contact No</th>
							<th>Address</th>
							<th>Email</th>
							<th style="padding: 0 40px">Action</th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row" id="add">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add Insurance Company</h3>
				<a class="btn btn-info pull-right" href="#list">List</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" enctype="multipart/form-data" action="<?= company_url('save') ?>">
				<div class="box-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="companyCode">Company Code</label>
								<input type="text" class="form-control" id="companyCode" name="companyCode"
									   placeholder="Enter Company Code" required>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="companyName">Company Name</label>
								<input type="text" class="form-control" id="companyName" name="companyName"
									   placeholder="Enter Company Name" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="contactPerson">Contact Person</label>
								<input type="text" class="form-control" id="contactPerson" name="contactPerson"
									   placeholder="Enter Contact Person's Name"
									   required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="contactNo">Contact No</label>
								<input type="number" class="form-control" id="contactNo" name="contactNo"
									   placeholder="Enter Contact No" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" id="address" name="address"
									   placeholder="Enter Company Address"
									   required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email"
									   placeholder="Enter Company Email"
									   required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="remarks">Remarks</label>
								<textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label for="file">Attachment of documents</label>
								<input type="file" id="file" name="file">
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
	$(function () {
		$('#item-list').DataTable({
			scrollX: true,
			scrollY: 500,
			scrollCollapse: true,
			scroller: true,
			"ajax": {
				url: "<?= company_url('get_items') ?>",
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
