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

<div class="container">
        <h1>Empleados</h1>

        <h2>Horarios</h2>
        <a href="agregar-horario.php" class="button">Agregar Horario</a>
<?php
include 'conexion.php';
$sql = "SELECT * FROM horarios";
$resultado = mysqli_query($conn, $sql);
if (!$resultado) {
    echo "Error: " . mysqli_error($conn);
}
if (mysqli_num_rows($resultado) > 0) {
    echo "<table border='1'>";
    echo "<tr>
        <th>Hora Entrada</th>
        <th>Hora Salida</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['T-entrada'] . "</td>";
        echo "<td>" . $fila['T-salida'] . "</td>";
        echo "<td><a href='editar-horario.php?id=" . $fila['id'] . "'>Editar</a></td>";
        echo "<td><a href='eliminar_horario.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron Horarios.</p>";
}
mysqli_close($conn);
?>

        <p class="note">* Horarios de los empleados</p>
    </div>

</body>
</html>
