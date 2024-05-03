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

    <form action="login.php" method="post">
        <button type="submit">Cerrar Sesión</button>
    </form> </H3>
</div>

<div class="container">
    <h1>Empleados</h1>

    <input type="text" id="searchInput" onkeyup="buscarEmpleado()" placeholder="Buscar empleado">

    <?php
    include 'Conexion.php';
    // Verificar si hay un mensaje en la URL
    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        echo "<p style='color: green;'>$mensaje</p>";
    }
    // Consulta SQL para obtener la información de los empleados y sus estados
    $sql = "SELECT e.*, ee.nombre_estado 
            FROM empleado e 
            LEFT JOIN estados_empleados ee ON e.id_estado_empleado = ee.id_estado";

    $resultado = mysqli_query($conn, $sql);

    // Función para mostrar los empleados
    function mostrarEmpleados($resultado) {
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            echo "<table border='1' id='employeeTable'>"; // Agregamos el ID a la tabla
            echo "<tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Género</th>
                    <th>Contacto</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Fecha de Ingreso</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['ID-Empleado'] . "</td>";
                echo "<td>" . $fila['Nombre'] . "</td>";
                echo "<td>" . $fila['Apellido'] . "</td>";
                echo "<td>" . $fila['Genero'] . "</td>";
                echo "<td>" . $fila['Contacto'] . "</td>";
                echo "<td>" . $fila['Departamento'] . "</td>";
                echo "<td>" . $fila['Cargo'] . "</td>";
                echo "<td>" . $fila['Salario'] . "</td>";
                echo "<td>" . $fila['Fecha-Ingreso'] . "</td>";
                echo "<td>" . $fila['nombre_estado'] . "</td>";
                echo "<td><a href='editar_empleado.php?id=" . $fila['ID-Empleado'] . "'>Editar</a></td>";
                echo "<td><a href='eliminar_empleado.php?id=" . $fila['ID-Empleado'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este empleado?\")'>Eliminar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron empleados.</p>";
        }
    }

    mostrarEmpleados($resultado);

    mysqli_close($conn);
    ?>

    <p class="note">* Entrada y control de empleados</p>

    <button onclick="window.location.href = 'formulario_agregar_empleado.php';">Agregar Empleado</button>
</div>
    
<script>
function buscarEmpleado() {
    var input, filter, table, tr, td, i, j;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("employeeTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        var found = false;
        var columnsToSearch = [0, 1, 2, 4, 5]; // Indexes of columns to search: ID, Nombre, Apellido, Departamento, Cargo
        for (j = 0; j < columnsToSearch.length; j++) {
            td = tr[i].getElementsByTagName("td")[columnsToSearch[j]];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }
        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>
