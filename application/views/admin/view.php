<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Active User</h5>
			<button class="btn btn-sm" id="close">x</button>
		</div>
		<div class="modal-body">
			<div class="container text-left">
				<div class="row justify-content-center py-2">
					<?php foreach ($results as $result) { ?>
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
									<h4 class="text-center"><b class=""><?php echo $result->buyer_name ?></b></h4>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<b>Space Label </b>
										</div>
										<div class="col-md-6">
											<p><?php echo $result->area_id; ?></p>
										</div>
									</div>

									<div class="row text-info">
										<div class="col-md-6">
											<b>Code </b>
										</div>
										<div class="col-md-6">
											<p style="font-weight: bold"><?php echo $result->code; ?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<b>Client Name </b>
										</div>
										<div class="col-md-6">
											<p><?php echo $result->buyer_name; ?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<b>Client Email </b>
										</div>
										<div class="col-md-6">
											<p><?php echo $result->buyer_email; ?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<b>Register Date </b>
										</div>
										<div class="col-md-6">
											<p><?php echo date('d F, Y', strtotime($result->created)); ?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<b>Expire Date </b>
										</div>
										<div class="col-md-6">
											<p class="<?php echo $result->expireAt === date('Y-m-d') ? 'text-danger' : '' ?>"><?php echo date('d F, Y', strtotime($result->expireAt)); ?></p>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<b>Amount </b>
										</div>
										<div class="col-md-6">
											<p><?php echo $result->paid_amount . ' ' . $result->paid_amount_currency; ?></p>
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
											<img id="previewTicket" class="embed-responsive" alt="Bike Purchase Ticket"
											     src="<?= $result->purchaseTicket ? base_url('images/' . $result->user_id . '/' . $result->purchaseTicket) : base_url('images/noImage.png') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
