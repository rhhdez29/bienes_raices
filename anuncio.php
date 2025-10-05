<?php 
    
    require 'includes/funciones.php';
    incluirTemplate('header'); 
    
?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="img/webp">
            <source srcset="build/img/destacada.jpg" type="img/jpg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen Destacada">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>4</p>
                </li>
            </ul>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. In praesentium cumque, id officia velit, quia voluptatibus dolores esse, sint saepe ab quibusdam beatae distinctio maiores sed consequuntur explicabo deserunt dolor?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab iure rem eveniet quos dolore atque itaque optio adipisci. Minima deserunt assumenda esse quas porro atque nobis laborum consectetur hic.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi nesciunt tempora sit recusandae eveniet voluptatum delectus, impedit nam modi suscipit, dolore fuga a cupiditate consequatur eaque consequuntur beatae? Voluptas, omnis!
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, neque in. Mollitia, est fuga ullam aperiam amet ratione neque dolorum temporibus, blanditiis non illum quis suscipit! Est suscipit optio voluptate?
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores pariatur officiis voluptate adipisci dicta ipsum quae reprehenderit expedita, omnis optio, doloribus suscipit distinctio, eligendi vero! Odio quidem debitis obcaecati quasi.
            </p>

        </div>

    </main>

<?php 
    incluirTemplate('footer'); 
?>