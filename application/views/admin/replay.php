<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Replay to issue</h5>
			<button class="btn btn-sm" id="close">x</button>
		</div>
		<div class="modal-body">
			<div class="container">
				<div class="row justify-content-center align-items-center py-2">
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								<form class="form-group" method="post"
								      action="<?php echo base_url('admin/saveReplay/' . $report['id'] ) ?>">
									<div class="row">
										<div class="col-md-5">
											<b>User Name</b>
										</div>
										<div class="col-md-7">
											<p> <?php echo $report['username'] ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-5">
											<b>Issue</b>
										</div>
										<div class="col-md-7">
											<p> <?= $report['waterError'] ? 'Water in the parking' : ($report['spaceError'] ?
													'I cannot book a space' : ($report['databaseError'] ? 'I receive a database error' : $report['note'])) ?></p>
										</div>
									</div>
									<div class="form-group">
										<label for="replay">Replay</label>
										<textarea name="replay" class="form-control" style="height: 90px"><?= $report['replay'] ?></textarea>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success float-right">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
