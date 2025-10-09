<?php 
    
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];
    

    //Autenticar el usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = $_POST['email'];
        $password = $_POST['password'];

        //Validar que el usuario exista
        $errores = [];

        if(!$email) {
            $errores[] = "El email es obligatorio";
        }

        if(!$password) {
            $errores[] = "El password es obligatorio";
        }

        if(empty($errores)) {
            //Consultar si el usuario existe
            $db = conectarDB();
            $query = "SELECT * FROM usuarios WHERE email = '${email}';";
            $resultado = mysqli_query($db, $query);

            if($resultado->num_rows) {
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if($auth) {
                    //El usuario está autenticado
                    session_start();

                    //Llenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /bienes_raices/admin/index.php');

                } else {
                    $errores[] = "El password es incorrecto";
                }

            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }
    require 'includes/funciones.php';

    //Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header'); 
    
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <form method="POST" class="formulario">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" require>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" require>

                <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

            </fieldset>

        </form>

    </main>

<?php 
    incluirTemplate('footer'); 
?>
