<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard | Simple Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="/vendors/bootstrap/css/bootstrap-4.3.1/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/simple-custom.css">
	<link rel="stylesheet" type="text/css" href="/vendors/icon/mdi/css/materialdesignicons.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="col-md-2 sidebar">
					<div class="brand">
						<a href="#" class="brand-name">Xin chào, {{ $data->name }}</a>
					</div>
					<div class="sidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a href="#" class="nav-link active"><i class="mdi mdi-monitor"></i> Dashboard</a>
							</li>
							<li class="nav-item">
								<a href="form" class="nav-link"><i class="mdi mdi-lead-pencil"></i> Form</a>
							</li>
							<li class="nav-item">
								<a href="table" class="nav-link"><i class="mdi mdi-table"></i> Data Table</a>
							</li>
						</ul>
					</div>
					<div class="nav-bottom">
						<ul class="nav">
							<li class="nav-item edit-button">
								<li class="nav-item">
									<a href="logout" class="nav-link">
										<i class="mdi mdi-power"></i>Đăng xuất
									</a>
								</li>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<main class="col-md-9 col-lg-10" role="main">
				<div class="container">
					<div class="content-header mt-2 mb-3">
						<h2 class="text-header">Dashboard</h2>
					</div>
					<div class="alert alert-danger">
						This template is under maintenance!
					</div>
					<div class="row mb-3 widget">
						<div class="col-md-3 pr-1">
							<div class="card alert-success">
								<div class="card-body">
									<div class="float-left">
										<h3 class="value-widget">$ 153.000</h3>
										<label class="title-widget">Revenue</label>
									</div>
									<div class="float-right">
										<i class="mdi mdi-cash-usd-outline mdi-48px"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 pr-1">
							<div class="card alert-warning">
								<div class="card-body">
									<div class="float-left">
										<h3 class="value-widget">20</h3>
										<label class="title-widget">Sales</label>
									</div>
									<div class="float-right">
										<i class="mdi mdi-cart mdi-48px"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 pr-1">
							<div class="card alert-primary">
								<div class="card-body">
									<div class="float-left">
										<h3 class="value-widget">20</h3>
										<label class="title-widget">Customer</label>
									</div>
									<div class="float-right">
										<i class="mdi mdi-ticket-account mdi-48px"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card alert-dark">
								<div class="card-body">
									<div class="float-left">
										<h3 class="value-widget">20</h3>
										<label class="title-widget">Employee</label>
									</div>
									<div class="float-right">
										<i class="mdi mdi-gift mdi-48px"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row basic mb-3">
						<div class="col-md-6 pr-1">
							<div class="card">
								<div class="card-body pb-0">
									<label class="title-body">Chart Daily</label>
									<canvas style="width: 100%"></canvas>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<label class="title-body">Todo List</label>
									<canvas style="width: 100%" height="140"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>


<!-- Jquery -->
<script src="/vendors/bootstrap/js/jquery-3.3.1/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="/vendors/bootstrap/js/bootstrap-4.3.1/bootstrap.min.js"></script>
<!-- Popper -->
<script src="/vendors/bootstrap/js/popper/popper.min.js"></script>
</body>
</html>