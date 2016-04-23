<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Olimpíadas 2016</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Olimpiadas2016/produto/codigo/style/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/Olimpiadas2016/produto/codigo/style/stylish-portfolio.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/Olimpiadas2016/produto/codigo/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <style type="text/css">
    .link-login, .link-login:hover {
        background-color: lightseagreen !important;
        color: white !important;
    }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/Olimpiadas2016/produto/codigo/index.php#page-top">Olimpíadas 2016</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/Olimpiadas2016/produto/codigo/index.php#modalidade">Modalidades</a></li>
                    <li><a href="/Olimpiadas2016/produto/codigo/index.php#calendario">Calendário</a></li>
                    <li><a href="/Olimpiadas2016/produto/codigo/index.php#bh">BH</a></li>                    
                    <?php if (!isset($_SESSION["login"])) {
                        echo '<li><a class="link-login" href="/Olimpiadas2016/produto/codigo/usuario/login.php#login">Login</a></li>';
                    } else {
                        $menuUsuario = '<li class="dropdown"><a href="#" class="dropdown-toggle link-login" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'
                            .$_SESSION["login"].'&ensp;<span class="caret"></span></a><ul class="dropdown-menu">';

                        if ($_SESSION["perfil"] == "Administrador") {
                            $menuUsuario .= '<li><a href="/Olimpiadas2016/produto/codigo/evento/listar.php#eventos"><span class="glyphicon glyphicon-calendar"></span>&emsp;Gerenciar Eventos</a></li>
                                <li role="separator" class="divider"></li>';
                        }

                       $menuUsuario .= '<li><a href="/Olimpiadas2016/produto/codigo/ingressos/comprar.php#comprar"><span class="glyphicon glyphicon-credit-card"></span>&emsp;Comprar Ingressos</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>&emsp;Meu Carrinho</a></li>
                                <li><a href="/Olimpiadas2016/produto/codigo/usuario/relatorio.php#relatorio"><span class="glyphicon glyphicon-list-alt"></span>&emsp;Emitir Relatórios</a></li>
                                <li><a href="/Olimpiadas2016/produto/codigo/usuario/editar.php#editar"><span class="glyphicon glyphicon-user"></span>&emsp;Meus dados</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/Olimpiadas2016/produto/codigo/usuario/logout.php"><span class="glyphicon glyphicon-log-out"></span>&emsp;Sair</a></li>
                            </ul>';

                        echo $menuUsuario;
                    } ?>                    
                </li>
                <li><a style="background-color:lightblue;" href="/Olimpiadas2016/produto/codigo/faq.php#faq">FAQ</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Header -->
<header id="page-top" class="header">
    <div class="text-vertical-center">
        <h1 style="color:white;text-shadow: 2px -2px 10px lime;">Olimpíadas 2016</h1>
    </div>
</header>