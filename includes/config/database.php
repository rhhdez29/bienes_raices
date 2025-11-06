<?php

function conectarDB() : mysqli {
    // Ajusta estas credenciales si tu servidor/usuario/contraseña/DB son diferentes
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'bienesraices_crud';

    $db = mysqli_connect($host, $user, $pass, $dbName);

    if(!$db){
        $errNo = mysqli_connect_errno();
        $errMsg = mysqli_connect_error();
        // Registra el error en el log del servidor PHP
        error_log("[conectarDB] MySQL connect error ({$errNo}): {$errMsg}");
        // Mostrar un mensaje claro para ayudar en la depuración local
        // En producción podrías eliminar la línea siguiente y devolver false o lanzar excepción
        die("Error de conexión a la base de datos ({$errNo}): {$errMsg}");
    }

    // Asegurar el charset
    mysqli_set_charset($db, 'utf8');

    return $db;
}