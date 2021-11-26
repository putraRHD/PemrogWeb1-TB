<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>HOME</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="css/login.css">
	</head>

	<body>
		<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
			<?php if ($_SESSION['role'] == 'admin') { ?>
				<!-- Admin AREA -->
				<div>
					<img src="img/admin-default.png" class="card-img-top" alt="admin image">
					<div class="card-body text-center">
						<h5 style="color: white" class="card-title">
							<?= $_SESSION['name'] ?>
						</h5>
						<a href="logout.php" class="btn btn-dark">Logout</a>
					</div>
				</div>
				<div class="p-3">
					<?php include 'php/members.php';
					if (mysqli_num_rows($res) > 0) { ?>

						<h1 style="color: white" class="display-4 fs-1 ">List Reservation</h1>
						<table style="color: white" class="table" style="width: 50rem;">
							<thead>
								<tr>
									<th scope="col">ID Reservasi</th>
									<th scope="col">Nama Customer</th>
									<th scope="col">Tanggal Reservasi</th>
									<th scope="col">Nomor Telp</th>
									<th scope="col">Email</th>
									<th scope="col">Acara</th>
								</tr>
							</thead>
							<tbody style="color: white;">
								<?php
								$i = 1;
								while ($rows = mysqli_fetch_assoc($res)) { ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $rows['name'] ?></td>
										<td><?= $rows['date'] ?></td>
										<td><?= $rows['phonenumber'] ?></td>
										<td><?= $rows['email'] ?></td>
										<td><?= $rows['event'] ?></td>
									</tr>
								<?php $i++;
								} ?>
							</tbody>
						</table>
					<?php } ?>
				</div>
				<!-- End Admin Area -->
			<?php } else { ?>
				<!-- USERS AREA -->
				<div class="card" style="width: 18rem;">
					<img src="img/user-default.png" class="card-img-top" alt="admin image">
					<div class="card-body text-center">
						<h5 class="card-title">
							<?= $_SESSION['name'] ?>
						</h5>
						<a href="logout.php" class="btn btn-dark">Logout</a>
					</div>
				</div>
				<!-- END USERS AREA -->
			<?php } ?>
		</div>
		<div class="photo-cred">
			<a class="text text--small" title="Check out their blog." href="bc.png" target="_blank"></a>
		</div>

		<div class="fullscreen-bg"></div>
	</body>

	</html>
<?php } else {
	header("Location: index.php");
} ?>