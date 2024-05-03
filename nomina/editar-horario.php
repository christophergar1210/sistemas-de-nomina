<?php
include 'Conexion.php';

// Variable para almacenar el mensaje de éxito
$mensaje = "";

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_horario = $_POST['id_horario'];
    $T_entrada = $_POST['entrada'];
    $T_salida = $_POST['salida'];

    // Actualizar los datos del horario en la base de datos
    $sql = "UPDATE horarios SET 
            `T-entrada` = '$T_entrada', 
            `T-salida` = '$T_salida' 
            WHERE `id` = '$id_horario'";

    if (mysqli_query($conn, $sql)) {
        $mensaje = "Horario editado correctamente.";
        header("Location: Horarios.php?mensaje=" . urlencode($mensaje));
        exit();
    } else {
        echo "Error al actualizar el Horario: " . mysqli_error($conn);
    }
}

// Recuperar el ID del horario a editar de la URL
$id_horario = $_GET['id'];

// Consulta SQL para obtener los datos del horario
$sql = "SELECT * FROM horarios WHERE `id` = '$id_horario'";
$resultado = mysqli_query($conn, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Horario</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        /* Aquí va el CSS que proporcionaste */
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Horario</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id_horario" value="<?php echo $id_horario; ?>">
            <div class="label-input-group">
                <label for="entrada">Hora de Entrada:</label>
                <input type="time" id="entrada" name="entrada" value="<?php echo $fila['T-entrada']; ?>">
            </div>
            <div class="label-input-group">
                <label for="salida">Hora de Salida:</label>
                <input type="time" id="salida" name="salida" value="<?php echo $fila['T-salida']; ?>">
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
<?php
} else {
    echo "<p>No se encontró ningún horario con el ID proporcionado.</p>";
}

mysqli_close($conn);
?>
