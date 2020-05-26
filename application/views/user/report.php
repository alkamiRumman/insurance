<div class="container">
	<div class="row justify-content-center py-2">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h3 class="text-center">Report History</h3>
					<hr>
					<table class="table table-bordered table-striped text-center table-sm">
						<thead class="table-dark">
						<tr>
							<td>Date</td>
							<td>Issue</td>
							<td>Note</td>
							<td>Replay</td>
						</tr>
						</thead>
						<tbody>
						<?php if ($report) {
							foreach ($report as $row) { ?>
								<tr>
									<td><?= date('M d, Y', strtotime($row->created)) ?></td>
									<td><?= $row->waterError ? 'Water in the parking' : ($row->spaceError ?
											'I cannot book a space' : ($row->databaseError ? 'I receive a database error' : 'Others')) ?></td>
									<td><?= $row->note ?></td>
									<td><?= $row->replay ?></td>

								</tr>
							<?php }
						}else{ ?>
						<tr>
							<td colspan="4">No report submitted yet!!</td>
							<?php } ?>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-left">
				<div class="card-body">
					<h3 class="text-center">Report an Issue</h3>
					<hr>
					<form method="post" action="<?= base_url('user/saveReport') ?>">
						<ul class="list-group list-group-flush">
							<li class="list-group-item">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" checked value="1" name="water" id="water">
									<label class="custom-control-label" for="water">Water in the parking</label>
								</div>
							</li>
							<li class="list-group-item">
								<!-- Default checked -->
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" value="1" name="space" id="space">
									<label class="custom-control-label" for="space">I cannot book a space</label>
								</div>
							</li>
							<li class="list-group-item">
								<!-- Default checked -->
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" value="1" name="database" id="database">
									<label class="custom-control-label" for="database">I receive a database error</label>
								</div>
							</li>
							<li class="list-group-item">
								<!-- Default checked -->
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" value="1" name="other" id="other">
									<label class="custom-control-label" for="other">Others</label>
								</div>
								<div class="custom-control textBox">
									<textarea name="note" style="height: 110px"></textarea>
								</div>
							</li>
						</ul>
						<div class="custom-control py-2">
							<button type="submit" class="btn btn-success" id="payBtn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('.textBox').hide();
	$('#other').on('click', function () {
		if ($('[type="checkbox"]').is(":checked")) {
			$('.textBox').show();
		} else {
			$('.textBox').hide();
		}
	});
	
	$(document).on('click', 'input[type="checkbox"]', function (e) {
	    $('input[type="checkbox"]').not(this).prop('checked', false);
	});
</script>
