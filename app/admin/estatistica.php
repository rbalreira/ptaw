<?php

session_start();

if(!isset($_SESSION['login'])) header("location: ../index.php");
if($_SESSION['login'] === 1) header("location: ../cliente/estatistica.php");
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Página Inicial - WishMachine</title>

	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="../libraries/img/favicon.png" rel="shortcut icon" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!-- Template Stylesheets -->
	<link rel="stylesheet" href="../libraries/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../libraries/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../libraries/css/slicknav.min.css" />
	<link rel="stylesheet" href="../libraries/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="../libraries/css/magnific-popup.css" />
	<link rel="stylesheet" href="../libraries/css/animate.css" />

	<!-- Main Template Stylesheets -->
	<link rel="stylesheet" href="../libraries/css/style.css" />
	<link rel="stylesheet" href="../libraries/css/custom_style.css" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Custom Stylesheets -->
	<link rel="stylesheet" href="css/estatistica.css" />
</head>

<body>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="estatistica.php" class="site-logo">
					<img src="../libraries/img/logo.png" alt="Sempre a inovar!">
				</a>
				<nav class="top-nav-area w-100 header-manual">
					<div class="user-panel-logged-in">
						<i class="fa fa-bell"></i> <span> / </span>
						<i class="fa fa-user"></i>
					</div>
					<ul class="main-menu primary-menu">
						<li><a href="#">Ver máquinas</a>
							<ul class="sub-menu">
								<li><a href="#">No mapa</a></li>
								<li><a href="#">Na lista</a></li>
							</ul>
						</li>
						<li><a href="#">Ver clientes</a></li>
						<li><a href="pedidos.php">Pedidos</a></li>
						<li><a href="estatistica.php">Estatística</a></li>
						<li></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Page top section -->
	<section class="page-top-section"></section>
	<!-- Page top end-->

	<!-- Container section -->
	<section class="hero-section overflow-hidden">
		<div class="container">
			<h5 class="text-right" id="time_maquinas">Última atualização</h5>
			<h4 class="card-title mt-3">Máquinas</h4>
			<select class="form-control col-xl-3" id="select_maquinas">
				<option selected>Por distrito</option>
				<option>Por concelho</option>
				<option>Por localidade</option>
			</select>
			<canvas id="maquinas_chart"></canvas>
		</div>
	</section>
	<!-- Container section end-->

	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<a href="#" class="footer-logo">
				<img src="../libraries/img/logo.png" alt="Logótipo">
			</a>
			<div class="footer-social d-flex justify-content-center">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-envelope"></i></a>
			</div>
			<div class="copyright"><a href="">WishMachine</a> 2019 @ All rights reserved</div>
		</div>
	</footer>

	<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Clique para voltar ao topo da página" data-toggle="tooltip" data-placement="left"><span class="fa fa-arrow-up"></span></a>

	<!-- Footer section end -->

	<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->

	<!-- Bootstrap library -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>

	<!-- SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<!-- Template Javascript -->
	<script src="../libraries/js/jquery-3.2.1.min.js"></script>
	<script src="../libraries/js/bootstrap.min.js"></script>
	<script src="../libraries/js/jquery.slicknav.min.js"></script>
	<script src="../libraries/js/owl.carousel.min.js"></script>
	<script src="../libraries/js/jquery.sticky-sidebar.min.js"></script>
	<script src="../libraries/js/jquery.magnific-popup.min.js"></script>
	<script src="../libraries/js/main.js"></script>

	<!-- Custom Javascript -->
	<script src="../libraries/js/arrow_top.js"></script>
	<script src="js/estatistica.js"></script>
</body>

</html>