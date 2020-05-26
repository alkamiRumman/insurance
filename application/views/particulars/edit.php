<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b>Update Company Details</b></h4>
			</div>
			<div class="modal-body">
				<form role="form" action="<?= particulars_url('update/' . $policy->id) ?>" method="post"
					  enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="uen"> UEN Number</label>
									<input type="text" class="form-control" id="uen" name="uen"
										   value="<?= $policy->uen ?>" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="companyName">Company Name</label>
									<input type="text" class="form-control" id="companyName" name="companyName"
										   value="<?= $policy->company ?>" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="typeOfBusiness">Type of Business</label>
									<input type="text" class="form-control" id="typeOfBusiness" name="typeOfBusiness"
										   value="<?= $policy->typeOfBusiness ?>" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="contactPerson">Contact Person</label>
									<input type="text" class="form-control" id="contactPerson" name="contactPerson"
										   value="<?= $policy->typeOfBusiness ?>"
										   required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="mobile">Mobile Number</label>
									<input type="number" class="form-control" id="mobile" name="mobile"
										   value="<?= $policy->mobile ?>"
										   required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="email">Email </label>
									<input type="email" class="form-control" id="email" name="email"
										   value="<?= $policy->email ?>" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="employees">Number of Employees</label>
									<input type="number" class="form-control" id="employees" name="employees"
										   value="<?= $policy->employees ?>" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="tel">Office Tel</label>
									<input type="text" class="form-control" id="tel" name="tel"
										   value="<?= $policy->tel ?>" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="remarks">Remarks</label>
									<textarea class="form-control" id="remarks" name="remarks"
											  rows="5"><?= $policy->remark ?>
									</textarea>
								</div>

								<div class="form-group">
									<label for="file">Attachment of documents</label>
									<input type="file" id="file" name="file">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="type">Types of Policy</label>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Health Plan') {
														echo 'checked';
													}
												}
											} ?> value="Health Plan">Health Plan
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Property') {
														echo 'checked';
													}
												}
											} ?> value="Property">Property
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'WICA') {
														echo 'checked';
													}
												}
											} ?> value="WICA"> WICA
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Personal Accident') {
														echo 'checked';
													}
												}
											} ?> value="Personal Accident">Personal Accident
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Public Liability') {
														echo 'checked';
													}
												}
											} ?> value="Public Liability">Public Liability
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Professional Liability') {
														echo 'checked';
													}
												}
											} ?> value="Professional Liability">Professional Liability
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Travel') {
														echo 'checked';
													}
												}
											} ?> value="Travel">Travel
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Motor') {
														echo 'checked';
													}
												}
											} ?> value="Motor"> Motor
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($policy->type)) {
												foreach (json_decode($policy->type)->type as $genre) {
													if ($genre == 'Others') {
														echo 'checked';
													}
												}
											} ?> value="Others">Others
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="discount">Corporate Discount</label>
									<div class="healthEdit"></div>
									<div class="propertyEdit"></div>
									<div class="WICAEdit"></div>
									<div class="PersonalEdit"></div>
									<div class="PublicEdit"></div>
									<div class="ProfessionalEdit"></div>
									<div class="TravelEdit"></div>
									<div class="MotorEdit"></div>
									<div class="OthersEdit"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('button').on('click', function (event) {
			var v = $("input[type='checkbox']:checked").length;
			if (v === 0) {
				event.preventDefault();
				alert("Please Select Any Type First");
			}
		})
		$.each($(".checkboxEdit input[type='checkbox']:checked"), function () {
			var val = $(this).val();
			if (val == 'Health Plan') {
				$('.healthEdit').html('<input type="number" name="discount[]" ' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Health Plan', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Property') {
				$('.propertyEdit').html('<input type="number" name="discount[]" ' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Property', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'WICA') {
				$('.WICAEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('WICA', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Personal Accident') {
				$('.PersonalEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Personal Accident', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Public Liability') {
				$('.PublicEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Public Liability', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Professional Liability') {
				$('.ProfessionalEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Professional Liability', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Travel') {
				$('.TravelEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Travel', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Motor') {
				$('.MotorEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Motor', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Others') {
				$('.OthersEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($policy->type) {
							$v = json_decode($policy->type)->type;
							$c = array_search('Others', $v);
							$d = json_decode($policy->type)->discount;
							echo $d[$c];
						}?>">');
			}
		});
		$('input[type="checkbox"]').on('click', function () {
			if ($(this).prop("checked") == true) {
				var val = $(this).val();
				console.log(val);
				if (val == 'Health Plan') {
					$('.healthEdit').html('<input type="number" name="discount[]" placeholder="Health Plan (%)" required>');
				}
				if (val == 'Property') {
					$('.propertyEdit').html('<input type="number" name="discount[]" placeholder="Property (%)" required>');
				}
				if (val == 'WICA') {
					$('.WICAEdit').html('<input type="number" name="discount[]" placeholder="WICA (%)" required>');
				}
				if (val == 'Personal Accident') {
					$('.PersonalEdit').html('<input type="number" name="discount[]" placeholder="Personal Accident (%)" required>');
				}
				if (val == 'Public Liability') {
					$('.PublicEdit').html('<input type="number" name="discount[]" placeholder="Public Liability (%)" required>');
				}
				if (val == 'Professional Liability') {
					$('.ProfessionalEdit').html('<input type="number" name="discount[]" placeholder="Professional Liability (%)" required>');
				}
				if (val == 'Travel') {
					$('.TravelEdit').html('<input type="number" name="discount[]" placeholder="Travel (%)" required>');
				}
				if (val == 'Motor') {
					$('.MotorEdit').html('<input type="number" name="discount[]" placeholder="Motor (%)" required>');
				}
				if (val == 'Others') {
					$('.OthersEdit').html('<input type="number" name="discount[]" placeholder="Others (%)" required>');
				}
			}
			if ($(this).prop("checked") == false) {
				var val = $(this).val();
				if (val == 'Health Plan') {
					$('.healthEdit').html('');
				}
				if (val == 'Property') {
					$('.propertyEdit').html('');
				}
				if (val == 'WICA') {
					$('.WICAEdit').html('');
				}
				if (val == 'Personal Accident') {
					$('.PersonalEdit').html('');
				}
				if (val == 'Public Liability') {
					$('.PublicEdit').html('');
				}
				if (val == 'Professional Liability') {
					$('.ProfessionalEdit').html('');
				}
				if (val == 'Travel') {
					$('.TravelEdit').html('');
				}
				if (val == 'Motor') {
					$('.MotorEdit').html('');
				}
				if (val == 'Others') {
					$('.OthersEdit').html('');
				}
			}
		});
	});
</script>
