
<?php require'assets/header.php'?>

<?php 

    session_start();

    if(!isset($_SESSION['rol'])){
        header("location: index.php");
    }else{
        #si la sesion existe validar que sea del rol adecuado
        # admin = 2
        if ($_SESSION['rol'] != 2) {
            header("Location: index.php");
        }
    }

?>



  
<h1 class="mt-4">Página Principal Admin</h1>






<?php require'assets/footer.php'?>