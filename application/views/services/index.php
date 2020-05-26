<div class="container text-left">
	<div class="row py-2">

		<?php for ($i = 1; $i < 41; $i++) { ?>
			<div class="col-md-3">
				<div class="card" style="height: 165px">
					<div class="card-body">
						<h4><?php echo 'Label: ' . $i; ?></h4>
						<?php foreach ($areas as $area) {
							if ($i == $area['id']) { ?>
								<div class="btn-link py-4">
									<?php if ($this->session->userdata('session') === 'user') { ?>
										<a class="btn btn-primary float-left"
										   href="<?php echo base_url('services/purchase/' . ($i)); ?>">Confirm</a>
									<?php } else { ?>
										<a class="btn btn-primary float-left"
										   href="<?php echo base_url('admin/confirm/' . ($i)); ?>">Confirm</a>
									<?php } ?>
								</div>
								<?php
							}
						}
							if ($services) {
								foreach ($services as $row) {
									if ($i == $row['area_id']) {
										if ($row['expireAt'] >= date('Y-m-d')) { ?>
											<?php if ($this->session->userdata('data')->id === $row['user_id']) { ?>
												<div>Username&nbsp;&nbsp;&nbsp;: <b><?= $row['buyer_name']; ?></b><br>
													<div class="text-info">
														Code 1&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['code']; ?><br>
														Code 2&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['code1']; ?>
													</div>
												</div>
											<?php } ?>
											<?php if ($this->session->userdata('session') === 'admin') { ?>
												<div>Username&nbsp;&nbsp;&nbsp;:
													<a class="" href="javascript:"
													   onclick="loadPopup('<?= site_url('services/view/' . $row['user_id']) ?>')">
														<b><?= $row['buyer_name']; ?></b></a>
													<div class="text-info">
														Code 1&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['code']; ?><br>
														Code 2&nbsp;&nbsp;&nbsp;&nbsp;: <?= $row['code1']; ?>
													</div>
												</div>
											<?php } ?>
											<div class="<?php echo $row['expireAt'] === date('Y-m-d') ? 'text-danger'
												: '' ?>">
												<p>Expired : <?= date('F d, Y', strtotime($row['expireAt'])); ?></p>
											</div>
											<?php
										}
									}
								}
							}
						?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>


