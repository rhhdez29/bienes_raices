<?php
    // Incluir utilidades y configuración
    require_once 'includes/funciones.php';
    require_once 'includes/config/database.php';

    $db = conectarDB();

    // Validar el id recibido por GET
    $id = $_GET['id'] ?? null;
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: ' . SITE_URL . '/');
        exit;
    }

    // Consultar la propiedad
    $query = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);

    if(!$resultado || mysqli_num_rows($resultado) === 0) {
        // Si la consulta falla o no existe la propiedad, redirigir al inicio
        header('Location: ' . SITE_URL . '/');
        exit;
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    incluirTemplate('header');
?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen Destacada">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad['precio']; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <?php echo $propiedad['descripcion']; ?>

        </div>

    </main>

<?php 
    mysqli_close($db);
    incluirTemplate('footer'); 
?>
