<?php
    $currentDir = dirname($_SERVER['SCRIPT_NAME']);
    $trimmed = trim($currentDir, '/');
    if ($trimmed === '') {
        $depth = 0;
    } else {
        $depth = substr_count($trimmed, '/');
    }
    $basePath = str_repeat('../', $depth);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="<?php echo $basePath; ?>build/css/app.css">
</head>
<body>

<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="contenedor contenedor-header">
        <div class="barra">
            <a href="<?php echo $basePath; ?>">
                <img class="logo" src="<?php echo $basePath; ?>build/img/logo.svg" alt="Logo de Bienes Raices">
            </a>

            <div class="mobile-menu">
                <img src="<?php echo $basePath; ?>build/img/barras.svg" alt="Icono Menu Responsive">
            </div>

            <div class="derecha">
                <img src="<?php echo $basePath; ?>build/img/dark-mode.svg" alt="Dark Mode" class="dark-mode-boton">
                <nav class="navegacion">
                    <a href="<?php echo $basePath; ?>nosotros.php">Nosotros</a>
                    <a href="<?php echo $basePath; ?>anuncios.php">Anuncios</a>
                    <a href="<?php echo $basePath; ?>blog.php">Blog</a>
                    <a href="<?php echo $basePath; ?>contacto.php">Contacto</a>
                </nav>
            </div>
        </div>
    </div>
</header>