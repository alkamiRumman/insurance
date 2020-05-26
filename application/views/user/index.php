<div class="container py-2">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="card" style="line-height: 2; text-align: left">
						<div class="card-body">
							<h3 class="text-center">Your Information</h3>
							<hr>
							<?php if ($userInfo) { ?>
								<div class="row pl-4">
									<div class="col-md-4">
										<h5>Label</h5>
									</div>
									<div class="col-md-8">
										<h4><?= $userInfo['area_id'] ?></h4>
									</div>
								</div>
								<div class="row pl-4 text-info">
									<div class="col-md-4">
										<h4>Code</h4>
									</div>
									<div class="col-md-8">
										<h4><?= $userInfo['code'] ?></h4>
									</div>
								</div>
								<div
									class="row pl-4 <?php echo $userInfo['expireAt'] <= date('Y-m-d') ? 'text-danger' : '' ?>">
									<div class="col-md-4">
										<label>Expired Date</label>
									</div>
									<div class="col-md-8">
										<label><?= date('M d, Y', strtotime($userInfo['expireAt'])) ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>User Name</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['username'] ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>Email</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['email'] ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>Phone</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['phone'] ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>Address</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['address'] ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>Registration Date</label>
									</div>
									<div class="col-md-8">
										<label><?= date('M d, Y H:m', strtotime($userInfo['created'])) ?></label>
									</div>
								</div>
							<?php } else { ?>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>User Name</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['username'] ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>Email</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['email'] ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>Phone</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['phone'] ?></label>
									</div>
								</div>
								<div class="row pl-4">
									<div class="col-md-4">
										<label>Address</label>
									</div>
									<div class="col-md-8">
										<label><?= $userInfo['address'] ?></label>
									</div>
								</div>
								<div class="row float-right py-2">
									<div class="col-md-12">
										<a href="<?= base_url('services/index') ?>" class="btn btn-success">Choose a Parking
											Area</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row py-2">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-center text-center">Payment History</h5>
							<table class="table table-bordered table-striped text-center table-sm">
								<thead class="table-dark">
								<tr>
									<td>Date</td>
									<td>Package</td>
									<td>Paid By</td>
								</tr>
								</thead>
								<tbody>
								<?php if ($paymentHistory) {
									foreach ($paymentHistory as $row) { ?>
										<tr>
											<td><?= date('M d, Y', strtotime($row->created)) ?></td>
											<td><? switch ($row->month) {
													case 1:
														echo '1 month 18€';
														break;
													case 3:
														echo '3 months 50€';
														break;
													case 6:
														echo '6 months 100€';
														break;
													case 12:
														echo '12 months 200€';
														break;
													default:
														echo 'Custom Package: ' . $row->month. ' months';
												} ?></td>
											<td><?= $row->card_number == 0 ? 'Registered By Admin' : '' ?></td>
										</tr>
									<?php }
								} else { ?>
									<td colspan="3">No payment done yet!!</td>
								<? } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card" style="line-height: 2; text-align: left">
				<div class="card">
					<div class="card-body">
						<h5 class="text-center">Your Bike Picture</h5>
						<img id="previewBike" class="img-thumbnail embed-responsive" alt="Bike Image"
						     src="<?= $userInfo['bike'] ? base_url('images/' . $userInfo['user_id'] . '/' . $userInfo['bike']) :
							     base_url('images/noImage.png') ?>">
					</div>
				</div>
			</div>
		</div>
