
<?php
    include_once 'database/database.php';
    $db = new Database();
    $query = $db->connect()->prepare('SELECT * FROM usuarios');
    $query->execute();

    #transforma a un arreglo los datos
    $row = $query->fetch(PDO::FETCH_NUM);

    #obtenemos el correo del usuario que está en el campo 3
    $correoUsuario = $row[1];

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración Reservaciones</title>

    <!-- Bootstrap core CSS -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Campestre Adobes </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item nav-link list-group-item-action dropdown-toggle" href="#" id="navbarDropdownReservaciones" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reservaciones
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownReservaciones">
                    <a class="dropdown-item" href="reservaciones-proximas.php">Próximos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="reservaciones-historico.php">Histórico</a>
                </div>
                <a href="reportes.php" class="list-group-item list-group-item-action bg-light">Reportes</a>
                <a href="ajustes.php" class="list-group-item list-group-item-action bg-light">Ajustes</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Menú</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cuenta
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logic/cerrar_sesion.php">Cerrar Sesión</a>
                            </div>

                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">