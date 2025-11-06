<?php
require 'includes/config/database.php';
$db = conectarDB();

// Crear un vendedor por defecto
$nombre = "Vendedor";
$apellido = "Demo";
$telefono = "1234567890";

// Verificar si ya existe un vendedor
$query = "SELECT * FROM vendedores WHERE nombre = '${nombre}' AND apellido = '${apellido}'";
$resultado = mysqli_query($db, $query);

if(mysqli_num_rows($resultado) == 0) {
    // Si no existe, crear el vendedor
    $query = "INSERT INTO vendedores (nombre, apellido, telefono) VALUES ('${nombre}', '${apellido}', '${telefono}')";
    
    if(mysqli_query($db, $query)) {
        echo "Vendedor creado exitosamente<br>";
    } else {
        echo "Error al crear vendedor: " . mysqli_error($db) . "<br>";
    }
} else {
    echo "El vendedor ya existe<br>";
}

// Mostrar todos los vendedores
$query = "SELECT * FROM vendedores";
$vendedores = mysqli_query($db, $query);

echo "<br>Vendedores en la base de datos:<br>";
while($vendedor = mysqli_fetch_assoc($vendedores)) {
    echo "ID: " . $vendedor['id'] . " - Nombre: " . $vendedor['nombre'] . " " . $vendedor['apellido'] . " - Teléfono: " . $vendedor['telefono'] . "<br>";
}

mysqli_close($db);
?>