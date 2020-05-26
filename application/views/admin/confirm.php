<div class="container py-2">
	<div class="row justify-content-center align-items-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Manually Registration</h3>
							<!-- service Info -->
							<p><b>Space Label:</b> <?php echo $label ?></p>
						</div>
						<hr>
						<div class="panel-body">
							<!-- Display errors returned by createToken -->
							<div class="card-errors"></div>

							<!-- Payment form -->
							<form action="<?= base_url('admin/confirmRegistration/' .$label) ?>" method="POST" id="paymentFrm">
								<div class="form-group admin_name">
									<label>USER</label>
									<select class="form-control" id="admin_name" name="userId" required>
										<option value="">Select User</option>
										<?php if ($usernames){
										foreach ($usernames as $email) { ?>
											<option
												value="<?= $email->id ?>"><?= $email->username . '&nbsp;&nbsp;&nbsp;Username: ' .
												$email->name ?></option>
										<? } } else{ ?>
										<option disabled class="text-danger">No user avaiable</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Packages</label>
									<select name="month" id="month" class="month form-control" required>
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
								<input type="hidden" name="price" id="price">
								<input type="hidden" name="expire" id="expire">
								<button type="submit" class="btn btn-success float-right" id="payBtn">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function (e) {
		$('.months').hide();
		$('.amountValue').hide();
		$("select.month").on('change', function () {
			var value = $(this).children("option:selected").val();
			switch (value) {
				case '0':
					$('.months').show();
					$('.amountValue').hide();
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
								$new = moment().add(1, 'months').format('DD MMMM, YYYY');
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
							if ($months == 2) {
								$new = moment().add(2, 'months').format('DD MMMM, YYYY');
								amount = 36;
								savings = 0;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
							if ($months == 3) {
								$('#month').val(50);
								$new = moment().add(3, 'months').format('DD MMMM, YYYY');
								amount = 50;
								savings = 4;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
							if ($months == 6) {
								$('#month').val(100);
								$new = moment().add(6, 'months').format('DD MMMM, YYYY');
								amount = 100;
								savings = 6;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
							if ($months == 12) {
								$('#month').val(200);
								$new = moment().add(12, 'months').format('DD MMMM, YYYY');
								amount = 200;
								savings = 16;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
							if ($months > 3 && $months < 6) {
								$new = moment().add($months, 'months').format('DD MMMM, YYYY');
								amount = 50 + (18 * ($months - 3));
								savings = 18 * $months - amount;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
							if ($months > 6 && $months < 12) {
								$new = moment().add($months, 'months').format('DD MMMM, YYYY');
								amount = 100 + (18 * ($months - 6));
								savings = 18 * $months - amount;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
							if ($months > 12) {
								$new = moment().add($months, 'months').format('DD MMMM, YYYY');
								amount = 200 + (18 * ($months - 12));
								savings = 18 * $months - amount;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
								$('#price').val(amount);
								$('#expire').val($new);
							}
						} else {
							$('#month').val('');
							$('#month').attr('required', true);
							$('.amountValue').hide();
						}
					});
					break;
				case '18':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment().add(1, 'months').format('DD MMMM, YYYY');
					$('.amountValue').html('Amount : ' + 18 + ' and Savings : ' + 0 + '<br> Expire Date : ' + $new);
					$('#price').val(18);
					$('#expire').val($new);
					break;
				case '50':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment().add(3, 'months').format('DD MMMM, YYYY');
					$('.amountValue').html('Amount : ' + 50 + ' and Savings : ' + 4 + '<br> Expire Date : ' + $new);
					$('#price').val(50);
					$('#expire').val($new);
					break;
				case '100':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment().add(6, 'months').format('DD MMMM, YYYY');
					$('.amountValue').html('Amount : ' + 100 + ' and Savings : ' + 8 + '<br> Expire Date : ' + $new);
					$('#price').val(100);
					$('#expire').val($new);
					break;
				case '200':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment().add(12, 'months').format('DD MMMM, YYYY');
					$('.amountValue').html('Amount : ' + 200 + ' and Savings : ' + 16 + '<br> Expire Date : ' + $new);
					$('#price').val(200);
					$('#expire').val($new);
					break;
				default:
					$('.months').hide();
					$('.amountValue').hide();
			}
		});
	});
</script>
