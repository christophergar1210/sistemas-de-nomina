<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Empleados</title>
</head>
<body>
    <h1>Búsqueda de Empleados</h1>
    <form action="" method="post">
        <label for="search">Buscar:</label>
        <input type="text" id="search" name="search">
        <button type="submit">Buscar</button>
    </form>
    <?php
    // Verificar si se ha enviado el formulario de búsqueda
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el término de búsqueda
        $search = $_POST["search"];

        // Realizar la consulta SQL para buscar empleados por ID, nombre, apellido y cargo
        $sql = "SELECT * FROM empleado WHERE 
                ID_Empleado LIKE '%$search%' OR 
                Nombre LIKE '%$search%' OR 
                Apellido LIKE '%$search%' OR 
                Cargo LIKE '%$search%'";
        
        // Ejecutar la consulta
        $resultado = mysqli_query($conn, $sql);

        // Verificar si se encontraron resultados
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            echo "<h2>Resultados de la búsqueda:</h2>";
            echo "<ul>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<li>" . $fila['ID_Empleado'] . " - " . $fila['Nombre'] . " " . $fila['Apellido'] . " - Cargo: " . $fila['Cargo'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se encontraron resultados para la búsqueda: $search</p>";
        }
    }
    ?>
</body>
</html>
