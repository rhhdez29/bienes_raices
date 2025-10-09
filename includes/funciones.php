<?php

require 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false ){
    include __DIR__ . "/templates/${nombre}.php"; 
}

function estaAutenticado(): bool {
    session_start();

    $auth = $_SESSION['login'];

    if($auth) {
        header('Location: /bienes_raices/admin/index.php');
    }

    return $auth;
}