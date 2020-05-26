<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-md">
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
				<div class="col-md-11">
					<label>Attachment of document</label>
				</div>
			</div>
			<img src="<?= $maid->file ? document_url($maid->file) : document_url('noImage.png') ?>"
			     height="250" width="350 class="img-responsive">
		</div>
	</div>
</div>
</div>
