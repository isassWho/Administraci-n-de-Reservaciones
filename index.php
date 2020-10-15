
<?php 
    include_once 'database/database.php';

    //Iniciamos sesion
    session_start();

    #verificar si hay sesión de rol
    if(isset($_SESSION['rol'])){
        switch ($_SESSION['rol']) {
            #reedirecciona a cada página
            case 1:
                header('location: index_root.php');
                break;
            case 2:
                header('location: index_admin.php');
                break;
            case 3:
                header('location: index_lector.php');
                break;
            default:
                break;
        }
    }

    #autenticar a un usuario
    if (isset($_POST['inputCorreo']) && isset($_POST['inputContrasena'])) {
        $correo = $_POST['inputCorreo'];
        $contrasena = $_POST['inputContrasena'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE correo = :correo AND contrasena = :contrasena');
        $query->execute(['correo' => $correo, 'contrasena' => $contrasena]);

        #transforma a un arreglo los datos
        $row = $query->fetch(PDO::FETCH_NUM);

        if($row == true){
            #obtenemos el rol que esta en el campo 3
            $rol = $row[3];
            #lo asignamos
            $_SESSION['rol'] = $rol;
            
            switch ($_SESSION['rol']) {
                #reedirecciona a cada página
                case 1:
                    header('location: index_root.php');
                    break;
                case 2:
                    header('location: index_admin.php');
                    break;
                case 3:
                    header('location: index_lector.php');
                    break;
                default:
                    break;
            }

        }else{
            ##jf
            echo "El usuario o contraseña son incorrectos.";
        }

    }


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <!-- Bootstrap core CSS -->
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <img class="img-fluid d-block mx-auto" src="public/images/Logo.png" alt="Logo" width="200px">
                        <h6>Módulo:</h6>
                        <h6>Administración de Reservaciones</h6>
                        <hr>
                        <h5 class="card-title text-center">Iniciar Sesión</h5>
                        <form class="form-signin" method="POST" action="#">
                            <div class="form-label-group my-3">
                                <label for="inputCorreo">Correo Electrónico</label>
                                <input type="email" id="inputCorreo" name="inputCorreo" class="form-control" placeholder="ej. persona@adobes.com.mx" required  autofocus>
                            </div>

                            <div class="form-label-group my-3">
                                <label for="inputContrasena">Contraseña</label>
                                <input type="password" id="inputContrasena" name="inputContrasena" class="form-control" placeholder="Contraseña" required >
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="public/jquery/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
