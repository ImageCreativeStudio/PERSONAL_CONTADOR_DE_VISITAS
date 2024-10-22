<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';  // Puede variar dependiendo de tu servidor
$db = 'contador_visitas';  // Nombre de tu base de datos
$user = 'root';  // Usuario de la base de datos
$password = '';  // Contraseña del usuario

try {
    // Conectar a la base de datos con PDO
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Leer el contador de visitas actual
    $stmt = $conexion->prepare("SELECT contador FROM visitas WHERE id = 1");
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    // Incrementar el contador
    $contador = (int)$resultado['contador'] + 1;

    // Actualizar el contador en la base de datos
    $stmt = $conexion->prepare("UPDATE visitas SET contador = :contador WHERE id = 1");
    $stmt->bindParam(':contador', $contador, PDO::PARAM_INT);
    $stmt->execute();

    // Mostrar el número de visitas
    echo "Este sitio ha sido visitado $contador veces.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conexion = null;
