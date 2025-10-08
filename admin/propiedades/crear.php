<?php 
    
    //Base de datos
    require '../../includes/config/database.php';

    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);
    if(!$resultado){
        // Mostrar error en desarrollo; en producción registra en un log
        echo '<p style="color:crimson;">Error al obtener vendedores: ' . mysqli_error($db) . '</p>';
        $resultado = false;
    }

    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedor = '';

    //Ejecutar el codigo después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){
        //echo "<pre>";
        //var_dump($_POST);
        //echo"</pre>";

    // Saneamiento básico (usar mysqli_real_escape_string en inputs recibidos)
    $titulo = mysqli_real_escape_string($db, (string)($_POST['titulo'] ?? ''));
    $precio = isset($_POST['precio']) ? floatval(mysqli_real_escape_string($db, (string)$_POST['precio'])) : 0;
    $descripcion = mysqli_real_escape_string($db, (string)($_POST['descripcion'] ?? ''));
    $habitaciones = isset($_POST['habitaciones']) ? intval(mysqli_real_escape_string($db, (string)$_POST['habitaciones'])) : 0;
    $wc = isset($_POST['wc']) ? intval(mysqli_real_escape_string($db, (string)$_POST['wc'])) : 0;
    $estacionamiento = isset($_POST['estacionamiento']) ? intval(mysqli_real_escape_string($db, (string)$_POST['estacionamiento'])) : 0;
    $vendedor = isset($_POST['vendedor']) ? intval(mysqli_real_escape_string($db, (string)$_POST['vendedor'])) : null;
    $creado = date('Y-m-d');

    //Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un título";
        }

        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }

        if(strlen( $descripcion ) < 50 ){
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$wc){
            $errores[] = "El número de Baños es obligatorio";
        }

        if(!$estacionamiento){
            $errores[] = "El número de lugares de Estacionamiento es obligatorio";
        }

        if(!$vendedor){
            $errores[] = "Elige un vendedor";
        }

        if(!$imagen['name'] || !$imagen['error']){
            $errores[] = "La imagen es obligatoria";
        }

        //Validar por tamaño (100 Kb máximo)
        $medida = 1000 * 100;

        if($imagen['size' > $medida] = ){
            $errores[] = "La imagen es muy pesada";
        }

        //echo "<pre>";
        //var_dump($errores);
        //echo"</pre>";

        //Revisar que el array este vacio
        if(empty($errores)){

            //Subida de archivos
            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }
            
            //Generar un nombre unico
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            //Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );


            //Insertar en la base de datos (usar nombres de columna correctos)
            $valVendedor = ($vendedor === null) ? 'NULL' : intval($vendedor);
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('{$titulo}', {$precio}, '{$nombreImagen}','{$descripcion}', {$habitaciones}, {$wc}, {$estacionamiento}, '{$creado}', {$valVendedor})";

            $resultadoInsert = mysqli_query($db, $query);

            if($resultadoInsert){
                //Redireccionar al usuario
                header('Location: /admin?resultado=1');
                exit;
            }
        }

        
    };

   
    
    require '../../includes/funciones.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="mulipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo;?>">
                
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio;?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion;?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones;?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc;?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento;?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" >
                    <option value="">---Seleccione---</option>
                    <?php if($resultado): ?>
                        <?php while($vendedorDB = mysqli_fetch_assoc($resultado)): ?>
                            <option <?php $vendedorId === $vendedor['Id'] ? 'select' : ''?>   value="<?php echo htmlspecialchars($vendedorDB['id']); ?>" <?php echo ($vendedor == $vendedorDB['id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($vendedorDB['nombre'] . ' ' . ($vendedorDB['apellido'] ?? '')); ?></option>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer'); 
?>