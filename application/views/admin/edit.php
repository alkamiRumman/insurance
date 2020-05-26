<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Upgrade Registration</h5>
			<button class="btn btn-sm" id="close">x</button>
		</div>
		<div class="modal-body">
			<div class="container text-left">
				<div class="row justify-content-center align-items-center py-2">
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
								<form class="form-group" method="post"
								      action="<?php echo base_url('admin/update/' . $clients->id) ?>">
									<div class="row">
										<div class="col-md-5">
											<b>Client Name</b>
										</div>
										<div class="col-md-6">
											<p> <?php echo $clients->buyer_name ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-5">
											<b>Client Email </b>
										</div>
										<div class="col-md-6">
											<p><?php echo $clients->buyer_email ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-5">
											<b>Expire Date </b>
										</div>
										<div class="col-md-6">
											<p class="<?php echo $clients->expireAt === date('Y-m-d') ? 'text-danger' : '' ?>"><?php echo date('d F, Y', strtotime($clients->expireAt)); ?></p>
										</div>
									</div>
									<div class="form-group">
										<label>Space Label</label>
										<select class="form-control" name="space">
											<option selected value="<?= $clients->area_id ?>"><?= $clients->area_id ?></option>
											<?php foreach ($freeSpace as $s) { ?>
												<option value="<?php echo $s->id ?>"><?php echo $s->id ?></option>
											<?php } ?>
										</select>
									</div>
									<input type="hidden" id="expireAt" name="expireAt" value="<?php echo $clients->expireAt; ?>">
									<input type="hidden" id="amount" name="amount" value="<?php echo $clients->paid_amount; ?>">
									<div class="form-group">
										<label>Packages</label>
										<select name="month" id="month" class="month form-control">
											<option value="">Select Package</option>
											<option value="18">1 month 18€</option>
											<option value="50">3 months 50€</option>
											<option value="100">6 months 100€</option>
											<option value="200">12 months 200€</option>
											<option value="0">Custom Month</option>
										</select>
									</div>
									<div class="form-group months">
										<input type="number" min="1" name="months" id="months" class="form-control"
										       placeholder="Enter month">
									</div>
									<div class="border border-success pl-2 form-group amountValue">
										<pre class="amountValue"></pre>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success float-right">Upgrade</button>
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
<script>
	$(document).ready(function () {
		$('.months').hide();
		$('.amountValue').hide();
		$current = $('#expireAt').val();
		$("select.month").on('change', function () {
			var value = $(this).children("option:selected").val();
			switch (value) {
				case '0':
					$('.months').show();
					$('.amountValue').hide();
					$('#months').attr('required', true);
					$('#months').on('keyup', function () {
						$months = $('#months').val();
						if ($months != '') {
							$('.amountValue').show();
							$('#month').removeAttr('required');
							var amount, savings;
							if ($months == 1) {
								$('#month').val(18);
								amount = 18;
								savings = 0;
								$new = moment($current).add(1, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
							if ($months == 2) {
								$new = moment($current).add(2, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								amount = 36;
								savings = 0;
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
							if ($months == 3) {
								$('#month').val(50);
								$new = moment($current).add(3, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								amount = 50;
								savings = 4;
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
							if ($months == 6) {
								$('#month').val(100);
								$new = moment($current).add(6, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								amount = 100;
								savings = 6;
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
							if ($months == 12) {
								$('#month').val(200);
								$new = moment($current).add(12, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								amount = 200;
								savings = 16;
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
							if ($months > 3 && $months < 6) {
								$new = moment($current).add($months, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								amount = 50 + (18 * ($months - 3));
								savings = 18 * $months - amount;
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
							if ($months > 6 && $months < 12) {
								$new = moment($current).add($months, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								amount = 100 + (18 * ($months - 6));
								savings = 18 * $months - amount;
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
							if ($months > 12) {
								$new = moment($current).add($months, 'months').format('DD MMMM, YYYY');
								$('#expireAt').val($new);
								amount = 200 + (18 * ($months - 12));
								savings = 18 * $months - amount;
								$('#amount').val(amount);
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> New Expire Date : ' + $new);
							}
						} else {
							$('#month').val('');
							$('#months').attr('required', true);
							$('.amountValue').hide();
						}
					});
					break;
				case '18':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment($current).add(1, 'months').format('DD MMMM, YYYY');
					$('#expireAt').val($new);
					$('#amount').val(18);
					$('.amountValue').html('Amount : ' + 18 + ' and Savings : ' + 0 + '<br> New Expire Date : ' + $new);
					break;
				case '50':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment($current).add(3, 'months').format('DD MMMM, YYYY');
					$('#expireAt').val($new);
					$('#amount').val(50);
					$('.amountValue').html('Amount : ' + 50 + ' and Savings : ' + 4 + '<br> New Expire Date : ' + $new);
					break;
				case '100':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment($current).add(6, 'months').format('DD MMMM, YYYY');
					$('#expireAt').val($new);
					$('#amount').val(100);
					$('.amountValue').html('Amount : ' + 100 + ' and Savings : ' + 8 + '<br> New Expire Date : ' + $new);
					break;
				case '200':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment($current).add(12, 'months').format('DD MMMM, YYYY');
					$('#expireAt').val($new);
					$('#amount').val(200);
					$('.amountValue').html('Amount : ' + 200 + ' and Savings : ' + 16 + '<br> New Expire Date : ' + $new);
					break;
				default:
					$('.months').hide();
					$('.amountValue').hide();
			}
		});
	});
</script>



