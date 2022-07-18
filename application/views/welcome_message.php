<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Task</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>

<div id="container">
	<h1 class="text-center pt-4">Welcome To the test Dashboard Page</h1>
	<div class="row px-4 mt-4">

		<!--  3.1 Part -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<div class="card-header">
					Point #3.1 Active users
				</div>
				<div class="card-body">
					<h3><?= $active_users[0]['active_users']; ?> Users</h3>
				</div>
			</div>
		</div>

		<!--  3.2 Part -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<div class="card-header">
					Point #3.2 Active users From users Who have orders
				</div>
				<div class="card-body">
					<h3><?= $active_users_orders; ?> Users</h3>
				</div>
			</div>
		</div>

		<!--  3.3 Part -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<div class="card-header">
					Point #3.3 Active products
				</div>
				<div class="card-body">
					<h3><?= $active_products[0]['active_products']; ?> Products</h3>
				</div>
			</div>
		</div>

		<!--  3.4 Part -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<div class="card-header">
					Point #3.4 Active products which are not ordered
				</div>
				<div class="card-body">
					<h3><?= $active_products_not_ordered[0]['free_products']; ?> Products</h3>
				</div>
			</div>
		</div>

		<!--  3.5 Part -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<div class="card-header">
					Point #3.5 Active products which are ordered
				</div>
				<div class="card-body">
					<h3><?= $active_products_ordered[0]['ordered_products']; ?> Products</h3>
				</div>
			</div>
		</div>

		<!--  3.6 Part -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<div class="card-header">
					Point #3.6 Active products total prices
				</div>
				<div class="card-body">
					<h3><?= $total_orders_price; ?> USD</h3>
				</div>
			</div>
		</div>

		<!--  3.7 Part -->
		<div class="col-md-6 mb-4">
			<div class="card">
				<div class="card-header">
					Point #3.7 Active products total prices Per user
				</div>
				<div class="card-body">
					<?php foreach($user_total_price as $user) { ?>
						<h3><?= $user['name'] . " : " . $user['user_total']  ?> USD</h3>
					<?php } ?>
				</div>
			</div>
		</div>

		<!--  3.8 Part -->
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Point #3.8 Get RON and USD Rates to EURO
				</div>
				<div class="card-body">
					<h3>Euro To RON : <?= $euro_to_ron; ?></h3>
					<h3>Euro To USD : <?= $euro_to_usd; ?></h3>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
