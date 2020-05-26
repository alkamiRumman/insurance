<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b><?= $motor->name ?>'s Details</b></h4>
			</div>
			<div class="modal-body" style="padding-left: 40px">
			<div class="row">
				<div class="col-md-2">
					<label>Remark</label>
				</div>
				<div class="col-md-9">
					<p class="text-justify"><?= $motor->remark ? $motor->remark : 'No Remarks Available!' ?></p>
				</div>
			</div>
			<div class="row" style="padding-top: 15px">
				<div class="col-md-12 text-center">
					<label>Vehicle Information</label>
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>Driver Name</th>
							<th>Vehicle No</th>
							<th>Vehicle Make</th>
							<th>Vehicle Model</th>
							<th>Registration Date</th>
							<th>Engine CC</th>
							<th>Current Insurer</th>
							<th>Expiry Date</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>
								<?php $var = json_decode($motor->vehicleInfo);
									foreach ($var->driver as $row) {
										echo $row . '<br>';
									} ?>
							</td>
							<td>
								<?php foreach ($var->vehicleNo as $row) {
									echo $row . '<br>';
								} ?>
							</td>
							<td>
								<?php foreach ($var->vehicleMake as $row) {
									echo $row . '<br>';
								} ?>
							</td>
							<td>
								<?php foreach ($var->vehicleModel as $row) {
									echo $row . '<br>';
								} ?>
							</td>
							<td>
								<?php foreach ($var->registrationDate as $row) {
									echo $row . '<br>';
								} ?>
							</td>
							<td>
								<?php foreach ($var->engine as $row) {
									echo $row . '<br>';
								} ?>
							</td>
							<td>
								<?php foreach ($var->currentInsurer as $row) {
									echo $row . '<br>';
								} ?>
							</td>
							<td>
								<?php foreach ($var->expireDate as $row) {
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
			<img src="<?= $motor->file ? document_url($motor->file) : document_url('noImage.png') ?>"
			     height="250" class="img-responsive">
		</div>
	</div>
</div>
</div>
