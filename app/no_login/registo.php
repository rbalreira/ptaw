<?php

session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] == 0) header("location: ../admin/estatistica.php");
    else {
        if ($_SESSION['login'] == 1) header("location: ../cliente/estatistica.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Registar conta - WishMachine</title>

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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="css/login_style.css" />
    <link rel="stylesheet" href="../libraries/css/custom_style.css" />
    <link rel="stylesheet" href="css/registo.css" />
</head>

<body>

    <!-- Header section -->
    <header class="header-section">
        <div class="header-warp">
            <div class="header-bar-warp d-flex">
                <!-- site logo -->
                <a href="../index.php" class="site-logo">
                    <img src="../libraries/img/logo.png" alt="Sempre a inovar!">
                </a>
                <nav class="top-nav-area w-100 header-manual">
                    <div class="user-panel login-manual">
                        <span>Já possui uma conta?</span>
                        <input type="button" class="btn btn-primary" id="login_button" value="Iniciar sessão">
                    </div>
                    <ul class="main-menu primary-menu">
                        <li><a href="login.php">Iniciar sessão</a></li>
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
        <article class="card-body mx-auto container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h4 class="card-title mt-3 text-center">Comece a enriquecer a sua empresa</h4>
                        <div class="card-body">
                        <div class="required_field" id="required_fields">* Campos obrigatórios</div>
                            <form class="form-horizontal" id="registo_form">
                                <div class="form-group">
                                    <label for="name" class="cols-sm-2 control-label">Empresa</label> <span class="required_field" id="empty_name">*</span>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Insira o nome da empresa" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="cols-sm-2 control-label">E-mail</label> <span class="required_field" id="empty_email">*</span>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Insira o e-mail" />
                                            <div id="invalid_email" class="invalid-feedback">E-mail inválido</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nif" class="cols-sm-2 control-label">NIF</label> <span class="required_field" id="empty_nif">*</span>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nif" id="nif" placeholder="Insira o número de identificação fiscal" />
                                            <div id="invalid_nif" class="invalid-feedback">NIF inválido</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contacto" class="cols-sm-2 control-label">Contacto</label> <span class="required_field" id="empty_num">*</span>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="number" id="number" placeholder="Insira o contacto" />
                                            <div id="invalid_contacto" class="invalid-feedback">Contacto inválido</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="codigo_postal" class="cols-sm-2 control-label">Código-Postal</label> <span class="required_field" id="empty_codpostal">*</span>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="codpostal" id="codpostal" placeholder="0000-000" />
                                            <div id="invalid_codpostal" class="invalid-feedback">Código-postal inválido</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="localidade" class="cols-sm-2 control-label">Localidades nesta Região</label> <span class="required_field" id="empty_region">*</span>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <select class="form-control option_select" name="region" id="region" disabled>
                                                <option selected>Região</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button" id="registo_button">Submeter pedido</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </article>
    </section>
    <!-- Container section end-->

    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Clique para voltar ao topo da página" data-toggle="tooltip" data-placement="left"><span class="fa fa-arrow-up"></span></a>

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
    <script src="../libraries/js/jquery-3.2.1.min.js"></script>
    <script src="../libraries/js/bootstrap.min.js"></script>
    <script src="../libraries/js/jquery.slicknav.min.js"></script>
    <script src="../libraries/js/owl.carousel.min.js"></script>
    <script src="../libraries/js/jquery.sticky-sidebar.min.js"></script>
    <script src="../libraries/js/jquery.magnific-popup.min.js"></script>
    <script src="../libraries/js/main.js"></script>

    <!-- Custom Javascript -->
    <script src="../libraries/js/arrow_top.js"></script>
    <script src="js/registo.js"></script>
</body>

</html>