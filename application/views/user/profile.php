<div class="container py-2">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="card">
				<div class="card-header">
					<h5 class="text-center">Your Profile Picture</h5>
				</div>
				<div class="card-body">
					<img id="profileImage" class="embed-responsive" alt="Profile Image"
					     src="<?= $userInfo->profile ? base_url('images/' . $userInfo->id . '/' . $userInfo->profile) : base_url('images/noImage.png') ?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h3 class="text-center">Update Profile</h3>
					<hr>
					<form method="post" id="form" enctype="multipart/form-data"
					      action="<?= base_url('user/update/' . $userInfo->id) ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" name="name"
									       value="<?= $userInfo->name ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="number" class="form-control" name="phone" value="<?= $userInfo->phone ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email">User Email</label>
							<input type="email" class="form-control" name="email" value="<?= $userInfo->email ?>">
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" value="<?= $userInfo->address ?>">

						</div>
						<div class="custom-checkbox">
							<label class="checkbox-inline"><input type="checkbox" value="checkbox" id="checkbox">Change
								Password</label>
						</div>
						<div class="form-group password">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label>Profile Picture</label>
							<input type="file" name="profile" id="profile">
						</div>
						<div class="form-group">
							<label>Bike Picture</label>
							<input type="file" name="bike" id="bike">
						</div>
						<div class="form-group">
							<label>Bike Purchase Order Ticket</label>
							<input type="file" name="purchaseTicket" id="purchaseTicket">
						</div>
						<div class="form-group float-right">
							<input type="submit" name="submit" value="Update" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="text-center">Your Bike Picture</h5>
						</div>
						<div class="card-body">
							<img id="previewBike" class="embed-responsive" alt="Bike Image"
							     src="<?= $userInfo->bike ? base_url('images/' . $userInfo->id . '/' . $userInfo->bike) : base_url('images/noImage.png') ?>">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="text-center">Purchase Order Ticket</h5>
						</div>
						<div class="card-body">
							<img id="previewPurchaseTicket" class="embed-responsive" alt="Purchase Order Ticket"
							     src="<?= $userInfo->purchaseTicket ? base_url('images/' . $userInfo->id . '/' . $userInfo->purchaseTicket) : base_url('images/noImage.png') ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$("#form").submit(function (submitEvent) {
				var filename = $("#profile").val();
				var extension = filename.replace(/^.*\./, '');

				if (extension == filename) {
					extension = '';
				} else {
					extension = extension.toLowerCase();
				}
				switch (extension) {
					case 'gif':
					case 'jpg':
					case 'jpeg':
					case 'png':
					case '':
						break;

					default:
						alert('Unknown Format of Profile Picture!');
						submitEvent.preventDefault();
				}

			});
		});

		$(document).ready(function () {
			$("#form").submit(function (submitEvent) {
				var filename = $("#bike").val();
				var extension = filename.replace(/^.*\./, '');

				if (extension == filename) {
					extension = '';
				} else {
					extension = extension.toLowerCase();
				}
				switch (extension) {
					case 'gif':
					case 'jpg':
					case 'jpeg':
					case 'png':
					case '':
						break;

					default:
						alert('Unknown Format of Bike Picture!');
						submitEvent.preventDefault();
				}
			})
		});

		$(document).ready(function () {
			$("#form").submit(function (submitEvent) {
				var filename = $("#purchaseTicket").val();
				var extension = filename.replace(/^.*\./, '');

				if (extension == filename) {
					extension = '';
				} else {
					extension = extension.toLowerCase();
				}
				switch (extension) {
					case 'gif':
					case 'jpg':
					case 'jpeg':
					case 'png':
					case '':
						break;

					default:
						alert('Unknown Format of Purchase Order Ticket!');
						submitEvent.preventDefault();
				}

			});
		});

		document.getElementById("profile").onchange = function () {

			let reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById("profileImage").src = e.target.result;
			};
			reader.readAsDataURL(this.files[0]);
		};

		document.getElementById("bike").onchange = function () {
			let reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById("previewBike").src = e.target.result;
			};
			reader.readAsDataURL(this.files[0]);
		};

		document.getElementById("purchaseTicket").onchange = function () {

			let reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById("previewPurchaseTicket").src = e.target.result;
			};
			reader.readAsDataURL(this.files[0]);
		};

		$(function () {
			$('.password').hide();
			$("#checkbox").on('click', function () {
				if ($('[type="checkbox"]').is(":checked")) {
					$('.password').show();
				} else {
					$('.password').hide();
				}
			})
		});
	</script>
