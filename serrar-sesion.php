<?php

    //Incluir funciones
    require 'includes/funciones.php';

    //Destruir la sesión
    session_start();
    $_SESSION = [];
    header('Location: ' . SITE_URL . '/index.php');