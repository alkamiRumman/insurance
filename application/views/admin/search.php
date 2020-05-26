<div class="container py-2">
	<div class="row justify-content-center">
		<?php if (!empty($results)) {
			foreach ($results

			as $result) {
		?>
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">
					<h6 class="text-center">Profile Picture</h6>
				</div>
				<div class="card-body">
					<img id="profileImage" class="embed-responsive" alt="Profile Image"
					     src="<?= $result->profile ? base_url('images/' . $result->user_id . '/' . $result->profile) : base_url('images/noImage.png') ?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="text-center">Searching for <b class="text-info"><?php echo $query ?></b></h4>
					<hr>
					<div class="row text-info">
						<div class="col-md-3">
							<b>Code </b>
						</div>
						<div class="col-md-3">
							<p style="font-weight: bold"><?php echo $result->code; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<b>Space Label </b>
						</div>
						<div class="col-md-3">
							<p><?php echo $result->area_id; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<b>Client Name </b>
						</div>
						<div class="col-md-6">
							<p><?php echo $result->buyer_name; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<b>Client Email </b>
						</div>
						<div class="col-md-6">
							<p><?php echo $result->buyer_email; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<b>Expire Date </b>
						</div>
						<div class="col-md-6">
							<p class="<?php echo $result->expireAt === date('Y-m-d') ? 'text-danger' : '' ?>"><?php echo date('d M, Y', strtotime($result->expireAt)); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h6 class="text-center">Bike Picture</h6>
						</div>
						<div class="card-body">
							<img id="previewBike" class="embed-responsive" alt="Bike Image"
							     src="<?= $result->bike ? base_url('images/' . $result->user_id . '/' . $result->bike) : base_url('images/noImage.png') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row py-2">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h6 class="text-center">Bike Purchase Ticket</h6>
						</div>
						<div class="card-body">
							<img id="previewBike" class="embed-responsive" alt="Bike Image"
							     src="<?= $result->purchaseTicket ? base_url('images/' . $result->user_id . '/' . $result->purchaseTicket) : base_url('images/noImage.png') ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }
		} else { ?>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="text-center">Searching for <b class="text-info"><?php echo $query ?></b></h4>
					<hr>
					<div class="row py-4">
						<div class="col-md-12">
							<pre class="text-center text-danger">No Match is Found!!</pre>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<script>
	$('#form').submit(function (e) {
		if ($.trim($("#search").val()) === "") {
			e.preventDefault();
			alert('Type name or active code first!!');
		}
	});
</script>
