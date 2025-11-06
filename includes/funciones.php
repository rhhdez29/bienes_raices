<?php

require_once __DIR__ . '/app.php';

function incluirTemplate( string $nombre, bool $inicio = false ){
    include __DIR__ . "/templates/${nombre}.php"; 
}

function estaAutenticado(): bool {
    // Asegurar que la sesión esté iniciada
    if(session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // Usar null coalesce para evitar 'undefined array key' y devolver siempre booleano
    $auth = $_SESSION['login'] ?? false;

    if(!$auth) {
        header('Location: /login.php');
        exit;
    }

    return true;
}