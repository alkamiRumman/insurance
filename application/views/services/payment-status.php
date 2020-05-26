<div class="container">
	<div class="row justify-content-center align-items-center py-2">
		<div class="col-md-6">
			<div class="card text-left">
				<div class="card-body">
					<?php if (!empty($order)) { ?>
						<!-- Display transaction status -->
						<?php if ($order['payment_status'] == 'succeeded') { ?>
							<h2 class="success">Your Payment has been Successful!</h2>
						<?php } else { ?>
							<h1 class="error">The transaction was successful! But your payment has been failed!</h1>
						<?php } ?>

						<h4 class="text-center">Payment Information</h4>
						<hr>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b>Reference Number</b>
							</div>
							<div class="col-md-6 pl-0">
								<p><?php echo $order['id']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b>Transaction ID</b>
							</div>
							<div class="col-md-7 pl-0">
								<p><?php echo $order['txn_id']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b>Paid Amount</b>
							</div>
							<div class="col-md-7 pl-0">
								<p><?php echo $order['paid_amount'] . ' ' . $order['paid_amount_currency']; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b class="text-danger">Savings</b>
							</div>
							<div class="col-md-7 pl-0">
								<p class="text-danger"><?php echo ($order['month'] * 18 - $order['paid_amount']) .
										' ' . $order['paid_amount_currency']; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b>Payment Status</b>
							</div>
							<div class="col-md-7 pl-0">
								<p> <?php echo $order['payment_status']; ?></p>
							</div>
						</div>

						<h4 class="text-center">Service Information</h4>
						<hr>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b>Space label</b>
							</div>
							<div class="col-md-7 pl-0">
								<p><?php echo $order['service_name']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b class="text-info">Reservation Code</b>
							</div>
							<div class="col-md-7 pl-0">
								<p class="text-info"><?php echo $order['code'] ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b>Registration Date</b>
							</div>
							<div class="col-md-7 pl-0">
								<p><?php echo date("d M, Y H:i:s", strtotime($order['created'])) ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 pr-0">
								<b>Expired Date</b>
							</div>
							<div class="col-md-7 pl-0">
								<p><?php echo date("d M, Y", strtotime($order['expireAt'])) ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-success float-right" id="btn">Print</button>
							</div>
						</div>
					<?php } else { ?>
						<h1 class="error">The transaction has failed</h1>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#btn").on('click', function () {
		window.print();
	});
</script>
