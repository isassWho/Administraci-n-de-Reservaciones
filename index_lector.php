<?php require 'assets/header.php' ?>

<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header("location: index.php");
} else {
    #si la sesion existe validar que sea del rol adecuado
    # lector = 3
    if ($_SESSION['rol'] != 3) {
        header("Location: index.php");
    }
}
?>




<h1 class="mt-4">Página Principal de Lector</h1>






<?php require 'assets/footer.php' ?>