<div class="container py-2">
	<div class="card">
		<div class="card-body">
			<div class="row py-4">
				<div class="col-md-12">
					<h3 class="text-center">User List</h3>
					<hr>
					<table id="result" class="table table-bordered table-striped text-center table-sm">
						<thead class="thead-dark">
						<tr>
							<th>Name</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Registration Date</th>
							<th>Profile Picture</th>
							<th>Bike Picture</th>
							<th>Bike Purchase Ticket</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
							if (empty($fetch)) {
								?>
								<tr>
									<td colspan="10">No Records Found</td>
								</tr>
								<?php
							}
							foreach ($fetch as $n) { ?>
								<tr>
									<td><?php echo $n->name; ?></td>
									<td><?php echo $n->username; ?></td>
									<td><?php echo $n->email ?></td>
									<td><?php echo $n->phone ?></td>
									<td><?php echo $n->address ?></td>
									<td><?php echo date("d M, Y", strtotime($n->created)); ?></td>
									<td><img id="profileImage<?= $n->id ?>" width="50" alt="Profile Image"
									         src="<?= $n->profile ? base_url('images/' . $n->id . '/'
										         . $n->profile) : base_url('images/noImage.png') ?>"
									         onclick="profile(<?= $n->id ?>)">
									</td>
									<td><img id="bikeImage<?= $n->id ?>" width="50" alt="Bike Image"
									         src="<?= $n->bike ? base_url('images/' . $n->id . '/'
										         . $n->bike) : base_url('images/noImage.png') ?>"
									         onclick="bike(<?= $n->id ?>)">
									</td>
									<td><img id="purchaseTicket<?= $n->id ?>" width="50" alt="Bike Purchase Ticket"
									         src="<?= $n->purchaseTicket ? base_url('images/' . $n->id . '/'
										         . $n->purchaseTicket) : base_url('images/noImage.png') ?>"
									         onclick="purchase(<?= $n->id ?>)">
									</td>
									<td>
										<div class="btn-group">
											<?php if ($this->checkUserVerification->status == 1) {
												if ($n->confirm == 0) {
													?>
													<a class="btn btn-success" href="<?= site_url('admin/adminVerification/' . $n->id); ?>"
													   onclick="return confirm('Are you sure?')">
														<i class="fa fa-check"></i>
													</a>
												<?php }
											} ?>
											<a onclick="return confirm('Are you sure?')"
											   href="<?php echo site_url('admin/deleteUser/' . $n->id); ?>"
											   class="btn btn-danger"><i class="fa fa-trash"></i></a>
										</div>
									</td>
								</tr>
								<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal">>
	<span class="close">&times;</span>
	<img class="modal-content" id="img01">
	<div id="caption"></div>
</div>
<script>
	var modal = document.getElementById("myModal");
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");

	function profile(id) {
		$('#profileImage' + id).each(function () {
			var name = this.src.split('/').pop();
			if (name != 'noImage.png') {
				modal.style.display = "block";
				modalImg.src = this.src;
				captionText.innerHTML = this.alt;
			}
		})
	};

	function bike(id) {
		$('#bikeImage' + id).each(function () {
			var name = this.src.split('/').pop();
			if (name != 'noImage.png') {
				modal.style.display = "block";
				modalImg.src = this.src;
				captionText.innerHTML = this.alt;
			}
		})
	};

	function purchase(id) {
		$('#purchaseTicket' + id).each(function () {
			var name = this.src.split('/').pop();
			if (name != 'noImage.png') {
				modal.style.display = "block";
				modalImg.src = this.src;
				captionText.innerHTML = this.alt;
			}
		})
	};

	var span = document.getElementsByClassName("close")[0];
	span.onclick = function () {
		modal.style.display = "none";
	};
</script>

<style>
	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0, 0, 0); /* Fallback color */
		background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
	}

	/* Modal Content (image) */
	.modal-content {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 400px;
	}

	/* Add Animation */
	.modal-content, #caption {
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {
			-webkit-transform: scale(0)
		}
		to {
			-webkit-transform: scale(1)
		}
	}

	@keyframes zoom {
		from {
			transform: scale(0)
		}
		to {
			transform: scale(1)
		}
	}

	/* The Close Button */
	.close {
		position: absolute;
		top: 13%;
		right: 35%;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}

	.modal-content, #caption {
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@keyframes zoom {
		from {
			transform: scale(0)
		}
		to {
			transform: scale(1)
		}
	}

	.close:hover,
	.close:focus {
		color: red;
		text-decoration: none;
		cursor: pointer;
	}

	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 400px) {
		.modal-content {
			width: 80%;
		}
	}
</style>
