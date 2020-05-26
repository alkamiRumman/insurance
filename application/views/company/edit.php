<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b>Update Company Details</b></h4>
			</div>
			<div class="modal-body">
				<form role="form" action="<?= company_url('update/' . $company->id) ?>" method="post"
				      enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="companyCode">Company Code</label>
								<input type="text" class="form-control" id="companyCode" name="companyCode"
								       value="<?= $company->code ?>" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="companyName">Company Name</label>
								<input type="text" class="form-control" id="companyName" name="companyName"
								       value="<?= $company->name ?>" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="contactPerson">Contact Person</label>
								<input type="text" class="form-control" id="contactPerson" name="contactPerson"
								       value="<?= $company->contactPerson ?>" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="contactNo">Contact No</label>
								<input type="number" class="form-control" id="contactNo" name="contactNo"
								       value="<?= $company->contactNo ?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" id="address" name="address"
								       value="<?= $company->address ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email"
								       value="<?= $company->email ?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="remarks">Remarks</label>
								<textarea class="form-control" id="remarks" name="remarks"
								          rows="3"><?= $company->remark ?></textarea>
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
				</form>
			</div>
		</div>
	</div>
</div>
