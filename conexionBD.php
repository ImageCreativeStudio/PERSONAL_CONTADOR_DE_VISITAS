<?php
// Aquí va tu código PHP para el contador de visitas
$host = 'localhost';  // Cambia según tu configuración
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

    // Guardar el número de visitas en una variable
    $numero_visitas = $contador;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conexion = null;

?>

<!-- Para la zona horaria y que aparezca en español -->
<?php
// Establecer la zona horaria
date_default_timezone_set('America/Argentina/Buenos_Aires');
// Establecer la configuración regional a español
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp');

// Obtener la fecha y la hora actual en formato de 24 horas
$fechaActual = date('d-m-Y');
$horaActual = date('h:i:s'); // 'H' para formato de 24 horas
// Obtener el día de la semana actual
$dia_actual = strftime("%A"); // %A devuelve el nombre completo del día
?>


<?php
// Verifica si la extensión intl está habilitada
if (extension_loaded('intl')) {
    // Crear un objeto IntlDateFormatter para formatear la fecha
    $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);

    // Obtener el día actual
    $dia_actual = $fmt->format(new DateTime());

    // Mostrar el día actual
    echo "Hoy es: $dia_actual";
} else {
    echo "La extensión Intl no está habilitada.";
}
?>