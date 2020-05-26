<div class="container py-2">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<canvas id="amountChart"></canvas>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<canvas id="countChart"></canvas>
					</div>
				</div>
			</div>
			<div class="row py-4">
				<div class="col-md-12">
					<hr>
					<h3 class="text-center">Active User</h3>
					<hr>
					<table id="result" class="table table-bordered table-striped text-center table-sm">
						<thead class="thead-dark">
						<tr>
							<th>Space</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Amount</th>
							<th>Registration Date</th>
							<th>Last Update</th>
							<th>Expire Date</th>
							<th>Code</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
							if (empty($fetch)) {
								?>
								<tr>
									<td colspan="9">No Records Found</td>
								</tr>
								<?php
							}
							foreach ($fetch as $n) {
								?>
								<tr class="<?php echo $n->expireAt === date('Y-m-d') ? 'text-danger' : '' ?>">
									<td><?php echo $n->area_id; ?></td>
									<td><?php echo $n->buyer_name ?></td>
									<td><?php echo $n->buyer_email ?></td>
									<td><?php echo $n->paid_amount . ' ' . $n->paid_amount_currency ?></td>
									<td><?php echo date("d M, Y H:m", strtotime($n->created)); ?></td>
									<td><?php echo date("d M, Y", strtotime($n->updatedAt)); ?></td>
									<td><?php echo date("d M, Y", strtotime($n->expireAt)); ?></td>
									<td><?php echo $n->code ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-success"
											        onclick="loadPopup('<?= site_url('admin/view/' . $n->id) ?>')">
												<i class="fa fa-eye"></i></button>
											<button class="btn btn-success"
											        onclick="loadPopup('<?= site_url('admin/edit/' . $n->id) ?>')">
												<i class="fa fa-edit"></i></button>
											<a onclick="return confirm('Are you sure?')"
											   href="<?php echo site_url('admin/delete/' . $n->id); ?>"
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
<script>
	$(function () {
		var cData = JSON.parse(`<?php echo $amount; ?>`);
		var ctx = $("#amountChart");
		console.log(cData);
		//bar chart data
		var data = {
			labels: cData.label,
			datasets: [
				{
					label: 'amount',
					data: cData.data,
					barThickness: 2,
					backgroundColor: "#DEB887",
					borderColor: "#CDA776"
				}
			]
		};

		//options
		var options = {
			scales: {
				xAxes: [{
					barPercentage: 1.0
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						aspectRatio: false,
						callback: function (value) {
							return value + ' €'
						}
					}
				}]
			},
			gridLines: {
				display: true
			},
			responsive: true,
			title: {
				display: true,
				position: "top",
				text: "Monthly Total Amount",
				fontSize: 18,
				fontColor: "#111"
			}, legend: {
				display: false,
			}
		};

		//create bar Chart class object
		var chart1 = new Chart(ctx, {
			type: "bar",
			data: data,
			options: options
		});

	});

	$(function () {
		var cData = JSON.parse(`<?php echo $amount; ?>`);
		var ctx = $("#countChart");

		//bar chart data
		var data = {
			labels: cData.countLabel,
			datasets: [
				{
					label: 'person',
					data: cData.countData,
					backgroundColor: "#9FDCD2",
					borderColor: "#9FDCD5",
					hoverBackgroundColor: "#479F91"
				}
			]
		};

		//options
		var options = {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						stepSize: 1
					}
				}]
			},
			responsive: true,
			title: {
				display: true,
				position: "top",
				text: "Monthly Total Visit",
				fontSize: 18,
				fontColor: "#111"
			}, legend: {
				display: false
			}
		};

		//create bar Chart class object
		var chart1 = new Chart(ctx, {
			type: "bar",
			data: data,
			options: options
		});

	});
</script>

