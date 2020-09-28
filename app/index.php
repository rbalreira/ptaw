<?php

session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] === 0) header("location: admin/estatistica.php");
    else{
        if ($_SESSION['login'] === 1) header("location: cliente/estatistica.php");
    }
}
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
	<link href="libraries/img/favicon.png" rel="shortcut icon" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<!-- Template Stylesheets -->
	<link rel="stylesheet" href="libraries/css/bootstrap.min.css" />
	<link rel="stylesheet" href="libraries/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libraries/css/slicknav.min.css" />
	<link rel="stylesheet" href="libraries/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="libraries/css/magnific-popup.css" />
	<link rel="stylesheet" href="libraries/css/animate.css" />
	<!-- Main Template Stylesheets -->
	<link rel="stylesheet" href="libraries/css/style.css" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Custom Stylesheets -->
	<link rel="stylesheet" href="no_login/css/login_style.css" />
	<link rel="stylesheet" href="libraries/css/custom_style.css" />
</head>

<body>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="index.php" class="site-logo">
					<img src="libraries/img/logo.png" alt="Sempre a inovar!">
				</a>
				<nav class="top-nav-area w-100 header-manual">
					<div class="user-panel dropdown">
						<a href="no_login/login.php"><i class="fa fa-user-circle"> <span>Iniciar sessão</span></i></a>
						<div class="dropdown-content">
							<form id="hover_login_form" method="post">
								<div class="form-group">
									<input type="email" class="form-control" id="hover_email" aria-describedby="emailHelp" placeholder="E-mail"
									name="email_post" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>">
									<input type="password" class="form-control" id="hover_pass" placeholder="Palavra-passe">
								</div>
								<button type="submit" class="btn btn-primary">Iniciar sessão</button>
								<div class="hover-links">
									<a href="">Esqueceu-se da palavra-passe?</a>
									<span>Não é um membro? <a href="no_login/registo.php">Clique aqui</a></span>
								</div>
							</form>
						</div>
					</div>
					<ul class="main-menu primary-menu">
						<li><a href="#">Sobre nós</a></li>
						<li><a href="#">Serviços</a></li>
						<li><a href="#">Máquina de vending</a></li>
						<li><a href="#">Contacte-nos</a></li>
						<li><a href="no_login/login.php">Iniciar sessão</a></li>
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

	<!-- Container section -->
	<section class="hero-section overflow-hidden">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="libraries/img/vending-machine.png" alt="Vending machine" />
				</div>
			</div>
		</div>
	</section>
	<!-- Container section end-->

	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<a href="#" class="footer-logo">
				<img src="libraries/img/logo.png" alt="Logótipo">
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

	<!-- SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<!-- Template Javascript -->
	<script src="libraries/js/jquery-3.2.1.min.js"></script>
	<script src="libraries/js/bootstrap.min.js"></script>
	<script src="libraries/js/jquery.slicknav.min.js"></script>
	<script src="libraries/js/owl.carousel.min.js"></script>
	<script src="libraries/js/jquery.sticky-sidebar.min.js"></script>
	<script src="libraries/js/jquery.magnific-popup.min.js"></script>
	<script src="libraries/js/main.js"></script>

	<!-- Custom Javascript -->
	<script src="libraries/js/arrow_top.js"></script>
	<script src="js/hover_login.js"></script>
</body>

</html>