<?php

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

// Verificar si la tabla usuarios existe
$checkTable = mysqli_query($db, "SHOW TABLES LIKE 'usuarios'");
if(mysqli_num_rows($checkTable) == 0) {
    // La tabla no existe, vamos a crearla
    $createTable = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(60) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(60) NOT NULL,
        UNIQUE KEY unique_email (email)
    )";
    
    if(mysqli_query($db, $createTable)){
        echo "Tabla usuarios creada correctamente<br>";
    } else {
        echo "Error al crear la tabla: " . mysqli_error($db) . "<br>";
        die();
    }
}

// crear datos del usuario
$nombre = "Admin";
$email = "correo@correo.com";
$password = "123456";
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Verificar si el usuario ya existe
$checkUser = mysqli_query($db, "SELECT * FROM usuarios WHERE email = '${email}'");
if(mysqli_num_rows($checkUser) > 0) {
    echo "El usuario ya existe<br>";
} else {
    // Query para crear el usuario (usando el hash)
    $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('${nombre}', '${email}', '${passwordHash}');";

    // Agregarlo a la base de datos y comprobar
    if(mysqli_query($db, $query)){
        echo "Usuario creado exitosamente:<br>";
        echo "Email: ${email}<br>";
        echo "Password sin encriptar: ${password}<br>";
        echo "Password hash: ${passwordHash}<br>";
    } else {
        echo "Error al crear usuario: " . mysqli_error($db) . "<br>";
    }
}

// Verificar los usuarios en la tabla
$allUsers = mysqli_query($db, "SELECT * FROM usuarios");
echo "<br>Usuarios en la base de datos:<br>";
while($row = mysqli_fetch_assoc($allUsers)) {
    echo "ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Email: " . $row['email'] . "<br>";
}

mysqli_close($db);