<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Nómina</title>

    <link rel="stylesheet" type="text/css" href="css.css">
    <link rel="shortcut icon" href="/Nomina.png" />
    <script src="menu.js" defer></script>

    <style>
        /* Estilos para los cuadros */
        .dashboard-box {
            background-color: #f0f0f0; /* Color de fondo */
            border: 1px solid #ccc; /* Borde */
            border-radius: 5px; /* Borde redondeado */
            padding: 20px; /* Espaciado interno */
            margin-bottom: 20px; /* Margen inferior */
        }

        .dashboard-box h2 {
            margin-top: 0; /* Elimina el margen superior del título */
        }
    </style>

</head>
<body>

<div class="dashboard">
    <h2>Opciones</h2>
    <H3>
    <ul>
    <li><a href="principal.php" id="principal-link">Principal</a></li>
    <div id="principal-options" style="display: none;">
        <!-- Contenido de las opciones de la página principal -->
    </div> <br><br>

    <li><a href="#" id="nomina-link">Nomina</a></li>
    <div id="nomina-options" style="display: none;">
        <ul>
            <li><a href="1.php">Nomina de empleado</a></li><br>
            <li><a href="#">Opción 2</a></li>
            <!-- Agrega más opciones según sea necesario -->
        </ul>
    </div> <br><br>

    <li><a href="#" id="empleados-link">Empleados</a></li>
    <div id="empleados-options" style="display: none;">
        <ul>
            <li><a href="empleados.php">Asistencia</a></li><br>
            <li><a href="L-Empleados.php">Lista de empleados</a></li>
            <!-- Agrega más opciones según sea necesario -->
        </ul>
    </div><br><br>
    <li><a href="Horarios.php" id="horarios-link">Horarios</a></li>
    <div id="horarios-options" style="display: none;">
        <!-- Contenido de las opciones de horarios -->
    </div> <br><br>
</ul>


    <form action="cerrar_sesion.php" method="post">
    <button type="submit">Cerrar Sesión</button>
    </form>
 </H3>
</div>

<?php
    include 'Conexion.php';

    // Verificamos si la conexión se realizó correctamente
    if ($conn) {
        function consultaTotalEmpleados($conn) {
            $sql = "SELECT COUNT(*) AS total_empleados FROM empleado";
            $resultado = mysqli_query($conn, $sql);
            return $resultado ? mysqli_fetch_assoc($resultado) : null;
        }

        $total_empleados = consultaTotalEmpleados($conn);

        mysqli_close($conn);
    } else {
        echo "<p>Error: No se pudo conectar a la base de datos.</p>";
    }
?>

<!-- Cuadro 1: Cantidad de empleados -->
<div class="dashboard-box">
    <h2>Cantidad de Empleados</h2>
    <?php if ($total_empleados) : ?>
        <p>Total: <?php echo $total_empleados['total_empleados']; ?></p>
    <?php else : ?>
        <p>No se pudo obtener la cantidad de empleados.</p>
    <?php endif; ?>
</div>


</body>
</html>
