<?php
    //importar la conexion
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

    // consultar: usar $limite pasada por la página que incluye este template (por ejemplo index.php)
    // si no viene, usar 3 por defecto
    $limite = isset($limite) ? intval($limite) : 3;
    $query = "SELECT * FROM propiedades LIMIT $limite";
    
    //obtener resultados
    $resultado = mysqli_query($db, $query);
?>


<div class="contenedor-anuncios">

    <?php while($propiedad = mysqli_fetch_assoc($resultado)) : ?>

    <div class="anuncio">
        <picture>
            <?php
                // Ruta real esperada donde se guardan las imágenes subidas por admin
                $rutaImagen = __DIR__ . '/../../imagenes/' . $propiedad['imagen'];
                $urlImagen = '/imagenes/' . $propiedad['imagen'];

                // Si no existe la imagen subida, usar una imagen por defecto del build
                if(!file_exists($rutaImagen) || empty($propiedad['imagen'])){
                    $urlImagen = 'build/img/destacada.jpg';
                }
            ?>
            <img loading="lazy" src="<?php echo $urlImagen; ?>" alt="anuncio">
        </picture>

        <div class="contenido-anuncio">
            <h3><?php echo htmlspecialchars($propiedad['titulo']); ?></h3>
            <p class="descripcion"><?php echo htmlspecialchars($propiedad['descripcion']); ?></p>
            <p class="precio">$<?php echo number_format(htmlspecialchars($propiedad['precio'])); ?></p>
            
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo htmlspecialchars($propiedad['wc']); ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo htmlspecialchars($propiedad['estacionamiento']); ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo htmlspecialchars($propiedad['habitaciones']); ?></p>
                </li>
            </ul>
                        
            <a href="/anuncio.php?id=<?php echo urlencode($propiedad['id']); ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div> <!--contenido-anuncio-->
    </div> <!--anuncio-->
    <?php endwhile; ?>
</div> <!--contenedor-anuncios-->

<?php
    //cerrar la conexion
    mysqli_close($db);
?>