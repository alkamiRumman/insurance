<div class="container py-2">
	<div class="card">
		<div class="card-body">
				<h3 class="text-center">Report an Issue</h3>
				<hr>
			<table class="table table-bordered table-striped text-center table-sm">
				<thead class="table-dark">
				<tr>
					<td>Reported Date</td>
					<td>User Name</td>
					<td>Issue</td>
					<td>Note</td>
					<td>Replay</td>
					<td>Replay Date</td>
					<td>Action</td>
				</tr>
				</thead>
				<tbody>
				<?php if ($report) {
					foreach ($report as $row) { ?>
						<tr>
							<td><?= date('M d, Y H:m', strtotime($row->created)) ?></td>
							<td><?= $row->username ?></td>
							<td><?= $row->waterError ? 'Water in the parking' : ($row->spaceError ?
									'I cannot book a space' : ($row->databaseError ? 'I receive a database error' : '')) ?></td>
							<td><?= $row->note ?></td>
							<td><?= $row->replay ?></td>
							<td><?= $row->updateAt ? date('M d, Y', strtotime($row->updateAt)) : '' ?></td>
							<td>
								<button class="btn btn-success"
								        onclick="loadPopup('<?= site_url('admin/replay/' . $row->id) ?>')">
									<i class="fa fa-edit"></i></button>
								<a onclick="return confirm('Are you sure?')"
											   href="<?php echo site_url('admin/deleteReplay/' . $row->id); ?>"
											   class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</td>

						</tr>
					<?php }
				}else{ ?>
				<tr>
					<td colspan="7">No report submitted yet!!</td>
					<?php } ?>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
