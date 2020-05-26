<div class="modal fade in" id="modal-default" style="display: block;overflow: auto; padding-left: 25px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><b>Update Company Details</b></h4>
			</div>
			<div class="modal-body">
				<form role="form" action="<?= particulars_url('updateOthers/' . $others->id) ?>" method="post"
					  enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="nric">NRIC/FIN No</label>
									<input type="text" class="form-control" id="nric" name="nric"
										   value="<?= $others->nric ?>" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" id="name" name="name"
										   value="<?= $others->name ?>" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="contact">Contact No</label>
									<input type="number" class="form-control" id="contact" name="contact"
										   value="<?= $others->contact ?>" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="email">Email </label>
									<input type="email" class="form-control" id="email" name="email"
										   value="<?= $others->email ?>" required>
								</div>
							</div>

							<div class="col-md-8">
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" class="form-control" id="address" name="address"
										   value="<?= $others->address ?>"
										   required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="remarks">Remarks</label>
									<textarea class="form-control text-left" id="remarks" name="remarks"
											  rows="5"><?= $others->remark ?></textarea>
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
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
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
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
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
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
													if ($genre == 'WICA') {
														echo 'checked';
													}
												}
											} ?> value="WICA">WICA
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
													if ($genre == 'Personal Accident') {
														echo 'checked';
													}
												}
											} ?> value="Personal Accident">Personal
											Accident
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
													if ($genre == 'Public Liability') {
														echo 'checked';
													}
												}
											} ?> value="Public Liability">Public
											Liability
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
													if ($genre == 'Professional Liability') {
														echo 'checked';
													}
												}
											} ?> value="Professional Liability">Professional
											Liability
										</label>
									</div>
									<div class="checkboxEdit checkbox">
										<label>
											<input type="checkbox"
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
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
												   name="type[]" <?php if (!empty($others->type)) {
												foreach (json_decode($others->type)->type as $genre) {
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
									<div class="OthersEdit"></div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(function () {
		$.each($(".checkboxEdit input[type='checkbox']:checked"), function () {
			var val = $(this).val();
			if (val == 'Health Plan') {
				$('.healthEdit').html('<input type="number" name="discount[]" ' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('Health Plan', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Property') {
				$('.propertyEdit').html('<input type="number" name="discount[]" ' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('Property', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'WICA') {
				$('.WICAEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('WICA', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Personal Accident') {
				$('.PersonalEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('Personal Accident', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Public Liability') {
				$('.PublicEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('Public Liability', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Professional Liability') {
				$('.ProfessionalEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('Professional Liability', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Travel') {
				$('.TravelEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('Travel', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
			if (val == 'Others') {
				$('.OthersEdit').html('<input type="number" name="discount[]"' +
						'value="<?php if ($others->type) {
							$v = json_decode($others->type)->type;
							$c = array_search('Others', $v);
							$d = json_decode($others->type)->discount;
							echo $d[$c];
						}?>">');
			}
		});
		$('input[type="checkbox"]').on('click', function () {
			if ($(this).prop("checked") == true) {
				var val = $(this).val();
				console.log(val);
				if (val == 'Health Plan') {
					$('.healthEdit').html('<input type="number" name="discount[]" placeholder="Health Plan (%)">');
				}
				if (val == 'Property') {
					$('.propertyEdit').html('<input type="number" name="discount[]" placeholder="Property (%)">');
				}
				if (val == 'WICA') {
					$('.WICAEdit').html('<input type="number" name="discount[]" placeholder="WICA (%)">');
				}
				if (val == 'Personal Accident') {
					$('.PersonalEdit').html('<input type="number" name="discount[]" placeholder="Personal Accident (%)">');
				}
				if (val == 'Public Liability') {
					$('.PublicEdit').html('<input type="number" name="discount[]" placeholder="Public Liability (%)">');
				}
				if (val == 'Professional Liability') {
					$('.ProfessionalEdit').html('<input type="number" name="discount[]" placeholder="Professional Liability (%)">');
				}
				if (val == 'Travel') {
					$('.TravelEdit').html('<input type="number" name="discount[]" placeholder="Travel (%)">');
				}
				if (val == 'Others') {
					$('.OthersEdit').html('<input type="number" name="discount[]" placeholder="Others (%)">');
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
				if (val == 'Others') {
					$('.OthersEdit').html('');
				}
			}
		});
	});
</script>
