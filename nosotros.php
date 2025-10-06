<?php include 'includes/templates/header.php'; ?>
    
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="img/webp">
                    <source srcset="build/img/nosotros.jpg" type="img/jpg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 anios de experiencia
                </blockquote>
                
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

        </div>
    </main>
    
    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>A ratione quaerat recusandae distinctio, veniam exercitationem consequuntur? Delectus minima natus quibusdam doloremque neque facilis culpa ut, repellat nemo autem magni accusantium.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>A ratione quaerat recusandae distinctio, veniam exercitationem consequuntur? Delectus minima natus quibusdam doloremque neque facilis culpa ut, repellat nemo autem magni accusantium.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>A ratione quaerat recusandae distinctio, veniam exercitationem consequuntur? Delectus minima natus quibusdam doloremque neque facilis culpa ut, repellat nemo autem magni accusantium.</p>
            </div>
        </div>
    </section>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav> 
            <!-- Barra -->
             <p class="copyright">Todos los derechos reservados 2025 &copy;</p>
        </div>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>