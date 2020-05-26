<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b><?= $maid->name ?>'s Details</b></h4>
			</div>
			<div class="modal-body" style="padding-left: 40px">
				<div class="row">
					<div class="col-md-2">
						<label>Remark</label>
					</div>
					<div class="col-md-9">
						<p class="text-justify"><?= $maid->remark ? $maid->remark : 'No Remarks Available!' ?></p>
					</div>
				</div>
				<div class="row" style="padding-top: 15px">
					<div class="col-md-12 text-center">
						<label>Maid Information</label>
						<table class="table table-responsive table-bordered table-striped">
							<thead>
							<tr>
								<th>Name</th>
								<th>Citizenship</th>
								<th style="padding: 0 35px">Date of Birth</th>
								<th>Address</th>
								<th>Emergency Contact</th>
								<th>Passport</th>
								<th>Work Permit Number</th>
								<th>Coverage Period</th>
								<th>Work Permit Type</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<?php $var = json_decode($maid->maidInfo);
										foreach ($var->maidName as $row) {
											echo $row . '<br>';
										} ?>
								</td>
								<td>
									<?php foreach ($var->citizenship as $row) {
										echo $row . '<br>';
									} ?>
								</td>
								<td>
									<?php foreach ($var->dob as $row) {
										echo $row . '<br>';
									} ?>
								</td>
								<td>
									<?php foreach ($var->maidAddress as $row) {
										echo $row . '<br>';
									} ?>
								</td>
								<td>
									<?php foreach ($var->emergencyContact as $row) {
										echo $row . '<br>';
									} ?>
								</td>
								<td>
									<?php foreach ($var->passport as $row) {
										echo $row . '<br>';
									} ?>
								</td>
								<td>
									<?php foreach ($var->workPermit as $row) {
										echo $row . '<br>';
									} ?>
								</td>
								<td>
									<?php foreach ($var->coveragePeriod as $row) {
										echo $row . ' year<br>';
									} ?>
								</td>
								<td>
									<?php foreach ($var->permitType as $row) {
										echo $row . '<br>';
									} ?>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row" style="padding-top: 15px">
					<div class="col-md-11">
						<label>Attachment of document</label>
					</div>
				</div>
				<img src="<?= $maid->file ? document_url($maid->file) : document_url('noImage.png') ?>"
					 height="250" class="img-responsive">
			</div>
		</div>
	</div>
</div>
