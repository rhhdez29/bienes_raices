<?php
// Script de prueba rápido para verificar la conexión a la BD
require __DIR__ . '/includes/config/database.php';

try {
    $db = conectarDB();
    echo "Conexión a la base de datos exitosa. Host: " . mysqli_get_host_info($db) . PHP_EOL;
    mysqli_close($db);
} catch (Throwable $e) {
    echo "Excepción al conectar: " . $e->getMessage() . PHP_EOL;
}
