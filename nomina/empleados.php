<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Nómina</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="menu.js" defer></script>
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

        <h2>Lista de Asistencias</h2>

<?php
include 'conexion.php';
$sql = "SELECT * FROM asistencia ORDER BY `Hora-Entrada` asc";
$resultado = mysqli_query($conn, $sql);
if (!$resultado) {
    echo "Error: " . mysqli_error($conn);
}
if (mysqli_num_rows($resultado) > 0) {
    echo "<table border='1'>";
    echo "<tr>
        <th>ID de Asistencia</th>
        <th>Fecha</th>
        <th>ID de Empleado</th>
        <th>Hora de entrada</th>
        <th>Hora de salida</th>
        </tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['ID-Asistencia'] . "</td>";
        echo "<td>" . $fila['Fecha'] . "</td>";
        echo "<td>" . $fila['ID-Empleado'] . "</td>";
        echo "<td>" . $fila['Hora-Entrada'] . "</td>";
        echo "<td>" . $fila['Hora-Salida'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron asistencias.</p>";
}
mysqli_close($conn);
?>

        <p class="note">* Entrada y control de empleados</p>
    </div>

</body>
<script>
    document.getElementById("submit").addEventListener("click", function() {
        window.print();
    });
</script>

</html>
