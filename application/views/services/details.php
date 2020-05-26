<div class="container">
	<div class="row justify-content-center align-items-center py-2">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Payment with Stripe par Space</h3>
							<!-- service Info -->
							<p><b>Space Label:</b> <?php echo $service['id']; ?></p>
						</div>
						<hr>
						<div class="panel-body">
							<!-- Display errors returned by createToken -->
							<div class="card-errors"></div>

							<!-- Payment form -->
							<form action="" method="POST" id="paymentFrm" novalidate>
								<div class="form-group name">
									<label>YOUR USERNAME</label>
									<input type="text" class="form-control" name="name" id="name"
									       value="<?= $this->session->userdata('data')->username ?>"
									       readonly="">
								</div>

								<div class="form-group email">
									<label>YOUR EMAIL</label>
									<input type="email" class="form-control" name="email" id="email" required
									       value="<?= $this->session->userdata('data')->email ?>">
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
								<div class="form-group card_number">
									<label>CARD NUMBER</label>
									<input type="text" class="form-control" name="card_number" id="card_number"
									       value=""
									       placeholder="1234 1234 1234 1234"
									       autocomplete="off" required="">
								</div>
								<div class="row card_details">
									<div class="col-md-6">
										<label>EXPIRY DATE</label>
										<div class="row">
											<div class="col-md-6">
												<input type="text" class="form-control" name="card_exp_month"
												       id="card_exp_month"
												       placeholder="MM"
												       required="">
											</div>
											<div class="col-md-6">
												<input type="text" class="form-control" name="card_exp_year"
												       id="card_exp_year"
												       placeholder="YYYY"
												       required="">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>CVC CODE</label>
											<input type="text" class="form-control" name="card_cvc" id="card_cvc"
											       placeholder="CVC"
											       autocomplete="off"
											       required="">
										</div>
									</div>
								</div>
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
						console.log($months);
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
							}
							if ($months == 2) {
								$new = moment().add(2, 'months').format('DD MMMM, YYYY');
								amount = 36;
								savings = 0;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
							}
							if ($months == 3) {
								$('#month').val(50);
								$new = moment().add(3, 'months').format('DD MMMM, YYYY');
								amount = 50;
								savings = 4;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
							}
							if ($months == 6) {
								$('#month').val(100);
								$new = moment().add(6, 'months').format('DD MMMM, YYYY');
								amount = 100;
								savings = 6;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
							}
							if ($months == 12) {
								$('#month').val(200);
								$new = moment().add(12, 'months').format('DD MMMM, YYYY');
								amount = 200;
								savings = 16;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
							}
							if ($months > 3 && $months < 6) {
								$new = moment().add($months, 'months').format('DD MMMM, YYYY');
								amount = 50 + (18 * ($months - 3));
								savings = 18 * $months - amount;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
							}
							if ($months > 6 && $months < 12) {
								$new = moment().add($months, 'months').format('DD MMMM, YYYY');
								amount = 100 + (18 * ($months - 6));
								savings = 18 * $months - amount;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
							}
							if ($months > 12) {
								$new = moment().add($months, 'months').format('DD MMMM, YYYY');
								amount = 200 + (18 * ($months - 12));
								savings = 18 * $months - amount;
								$('.amountValue').html('Amount : ' + amount + ' and Savings : ' + savings + '<br> Expire Date : ' + $new);
							}
						} else {
							$('#month').val(0);
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
					break;
				case '50':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment().add(3, 'months').format('DD MMMM, YYYY');
					$('.amountValue').html('Amount : ' + 50 + ' and Savings : ' + 4 + '<br> Expire Date : ' + $new);
					break;
				case '100':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment().add(6, 'months').format('DD MMMM, YYYY');
					$('.amountValue').html('Amount : ' + 100 + ' and Savings : ' + 8 + '<br> Expire Date : ' + $new);
					break;
				case '200':
					$('.months').hide();
					$('.amountValue').show();
					$new = moment().add(12, 'months').format('DD MMMM, YYYY');
					$('.amountValue').html('Amount : ' + 200 + ' and Savings : ' + 16 + '<br> Expire Date : ' + $new);
					break;
				default:
					$('.months').hide();
					$('.amountValue').hide();
			}
		});

		$("#paymentFrm").submit(function () {
			// Disable the submit button to prevent repeated clicks
			$('#payBtn').attr("disabled", "disabled");

			// Create single-use token to charge the user
			Stripe.createToken({
				number: $('#card_number').val(),
				exp_month: $('#card_exp_month').val(),
				exp_year: $('#card_exp_year').val(),
				cvc: $('#card_cvc').val()
			}, stripeResponseHandler);

			// Submit from callback
			return false;
		});
	});
	// Set your publishable key
	Stripe.setPublishableKey('<?php echo $this->config->item('stripe_publishable_key'); ?>');

	// Callback to handle the response from stripe
	function stripeResponseHandler(status, response) {
		if (response.error) {
			// Enable the submit button
			$('#payBtn').removeAttr("disabled");
			// Display the errors on the form
			$(".card-errors").html('<p class="text-danger">' + response.error.message + '</p>');
		} else {
			var form$ = $("#paymentFrm");
			// Get token id
			var token = response.id;
			// Insert the token into the form
			form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
			// Submit form to the server
			form$.get(0).submit();
		}
	}

	$('#payBtn').on('click', function (e) {
		var month = $('#month').val();
		var months = $('#months').val();
		var email = $('#email').val();
		if (month == '') {
			alert("Select a package first");
			e.preventDefault();
		} else if (month == 0) {
			if (months == '') {
				alert("Enter default month");
				e.preventDefault();
			}
		} else if (email == '') {
			alert("Email address required");
			e.preventDefault();
		}
	});
</script>
