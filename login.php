<?php 
    
    require_once 'includes/funciones.php';
    require 'includes/config/database.php';
    $db = conectarDB();

    // Iniciar sesión
    session_start();
    
    // Si el usuario ya está autenticado, redirigir al admin
    if(isset($_SESSION['login']) && $_SESSION['login']) {
        header('Location: /admin');
        exit;
    }

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
            // Escapar el email para prevenir SQL injection
            $email = mysqli_real_escape_string($db, $email);
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);
            
            if (!$resultado) {
                $errores[] = "Error al consultar la base de datos: " . mysqli_error($db);
            }

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

                    // Redirigir al admin
                    header('Location: /admin');
                    exit;

                } else {
                    $errores[] = "El password es incorrecto";
                }

            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }
    require_once 'includes/funciones.php';

    //Incluye el header
    incluirTemplate('header'); 
    
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <form method="POST" class="formulario">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" required>

                <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

            </fieldset>

        </form>

    </main>

<?php 
    incluirTemplate('footer'); 
?>
