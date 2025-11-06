<?php
require 'includes/config/database.php';
$db = conectarDB();

// Consultar las propiedades
$query = "SELECT * FROM propiedades";
$propiedades = mysqli_query($db, $query);

if(!$propiedades) {
    echo "Error en la consulta: " . mysqli_error($db);
    exit;
}

echo "<h2>Propiedades en la base de datos:</h2>";
if(mysqli_num_rows($propiedades) > 0) {
    while($propiedad = mysqli_fetch_assoc($propiedades)) {
        echo "<hr>";
        echo "ID: " . $propiedad['id'] . "<br>";
        echo "Título: " . $propiedad['titulo'] . "<br>";
        echo "Precio: " . $propiedad['precio'] . "<br>";
        echo "Imagen: " . $propiedad['imagen'] . "<br>";
        echo "Habitaciones: " . $propiedad['habitaciones'] . "<br>";
        echo "WC: " . $propiedad['wc'] . "<br>";
        echo "Estacionamiento: " . $propiedad['estacionamiento'] . "<br>";
        echo "Vendedor ID: " . $propiedad['vendedores_id'] . "<br>";
    }
} else {
    echo "<p>No hay propiedades en la base de datos.</p>";
}

mysqli_close($db);
?>