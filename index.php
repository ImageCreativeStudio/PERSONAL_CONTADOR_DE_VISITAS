<?php
require_once "conexionBD.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Tu hoja de estilos, si tienes -->
</head>

<body class="dark-mode">
    <header>
        <button id="toggle-dark-mode">Light</button> <!-- Por defecto en modo oscuro -->
        <h1 class="text-center">Bienvenido a mi contador de visitas</h1>
    </header>

    <main class="text-center">
        <h1>Fecha y Hora Actual</h1>
        <p>Hoy es <span class="numeroVisitantes"><?php echo "$dia_actual"; ?> <?php echo $fechaActual; ?></span></p>
        <p>Horario Argentina:</p>
        <div id="clock"></div>
        <p>Este sitio ha sido visitado <span class="numeroVisitantes"> <?php echo $numero_visitas; ?></span> veces.</p>
        <!-- Aquí puedes agregar más contenido -->
    </main>

    <footer>
        <small class="text-center">
            <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
        </small>
    </footer>

    <!-- Script -->
    <script src="script.js"></script>
</body>

</html>