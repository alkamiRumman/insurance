<div class="container py-2">
	<h3 class="text-center">Old Users</h3>
	<hr>
	<table class="table table-bordered table-striped text-center table-sm">
		<thead class="thead-dark">
		<tr>
			<th>Space</th>
			<th>User Name</th>
			<th>Email</th>
			<th>Registration Date</th>
			<th>Expire Date</th>
			<th>Code</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
			if (empty($fetch)) {
				?>
				<tr>
					<td colspan="8">No Records Found</td>
				</tr>
				<?php
			}
			$no = 1;
			foreach ($fetch as $n) {
				?>
				<tr class="<?php echo $n->expireAt === date('Y-m-d') ? 'text-danger' : '' ?>">
					<td><?php echo $n->area_id ?></td>
					<td><?php echo $n->buyer_name ?></td>
					<td><?php echo $n->buyer_email ?></td>
					<td><?php echo date("d M, Y H:m", strtotime($n->created)); ?></td>
					<td><?php echo date("d M, Y", strtotime($n->expireAt)); ?></td>
					<td><?php echo $n->code ?></td>
					<td><a href="<?php echo site_url('admin/renew/' . $n->id); ?>" class="btn btn-primary">Renew</a>
						<a onclick="return confirm('Are you sure?')"
						   href="<?php echo site_url('admin/delete/' . $n->id); ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php
			}
		?>
		</tbody>
	</table>
</div>


