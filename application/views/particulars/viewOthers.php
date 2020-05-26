<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b><?= $others->name ?>'s Details</b></h4>
			</div>
			<div class="modal-body" style="padding-left: 40px">
				<div class="row">
					<div class="col-md-11">
						<label>Remark</label>
						<p class="text-justify"><?= $others->remark ? $others->remark : 'No Remarks Available!' ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11">
						<table class="table">
							<thead>
							<tr>
								<th>Types of Policy</th>
								<th>Corporate Discount</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><?php if (!empty($others->type)) {
										foreach (json_decode($others->type)->type as $type) {
											echo $type. '<br>';
										}
									} ?></td>
								<td><?php if (!empty($others->type)) {
										foreach (json_decode($others->type)->discount as $discount) {
											echo $discount. ' % <br>';
										}
									} ?></td>
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
				<img src="<?= $others->file ? document_url($others->file) : document_url('noImage.png') ?>"
				     height="250" class="img-responsive">
			</div>
		</div>
	</div>
</div>
