<?php
include 'Conexion.php';

// Variable para almacenar el mensaje de éxito
$mensaje = "";

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_empleado = $_POST['ID-Empleado'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $contacto = $_POST ['contacto'];
    $departamento = $_POST['departamento'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $id_estado_empleado = $_POST['id_estado_empleado'];

    // Actualizar los datos del empleado en la base de datos
    $sql = "UPDATE empleado SET 
            Nombre = '$nombre', 
            Apellido = '$apellido', 
            Genero = '$genero', 
            Contacto = '$contacto',
            Departamento = '$departamento', 
            Cargo = '$cargo', 
            Salario = '$salario', 
            `Fecha-Ingreso` = '$fecha_ingreso', 
            id_estado_empleado = '$id_estado_empleado' 
            WHERE `ID-Empleado` = '$id_empleado'";

    if (mysqli_query($conn, $sql)) {
        $mensaje = "Empleado editado correctamente.";
        header("Location: L-Empleados.php?mensaje=" . urlencode($mensaje));
        exit();
    } else {
        echo "Error al actualizar el empleado: " . mysqli_error($conn);
    }
}

// Recuperar el ID del empleado a editar de la URL
$id_empleado = $_GET['id'];

// Consulta SQL para obtener los datos del empleado
$sql = "SELECT * FROM empleado WHERE `ID-Empleado` = '$id_empleado'";
$resultado = mysqli_query($conn, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        /* Aquí va el CSS que proporcionaste */
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Empleado</h1>



        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="ID-Empleado" value="<?php echo $id_empleado; ?>">
            <div class="label-input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $fila['Nombre']; ?>">
            </div>
            <!-- Agregar campos para los demás datos del empleado -->
            <div class="label-input-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $fila['Apellido']; ?>">
            </div>
            <div class="label-input-group">
                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" value="<?php echo $fila['Genero']; ?>">
            </div>
            <div class="label-input-group">
                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" name="contacto" value="<?php echo $fila['Contacto']; ?>">
            </div>
            <div class="label-input-group">
                <label for="departamento">Departamento:</label>
                <input type="text" id="departamento" name="departamento" value="<?php echo $fila['Departamento']; ?>">
            </div>
            <div class="label-input-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" value="<?php echo $fila['Cargo']; ?>">
            </div>
            <div class="label-input-group">
                <label for="salario">Salario:</label>
                <input type="text" id="salario" name="salario" value="<?php echo $fila['Salario']; ?>">
            </div>
            <div class="label-input-group">
                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                <input type="text" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $fila['Fecha-Ingreso']; ?>">
            </div>
            <div class="label-input-group">
                <label for="id_estado_empleado">Estado del Empleado:</label>
                <input type="text" id="id_estado_empleado" name="id_estado_empleado" value="<?php echo $fila['id_estado_empleado']; ?>">
            </div>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
<?php
} else {
    echo "<p>No se encontró ningún empleado con el ID proporcionado.</p>";
}

mysqli_close($conn);
?>
