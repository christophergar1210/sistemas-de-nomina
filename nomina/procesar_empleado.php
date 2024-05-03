<?php
session_start();

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'Conexion.php';

    // Obtener el ID del empleado del formulario
    $id_empleado = $_POST['ID-Empleado']; // Corregir el nombre del campo

    // Verificar si el empleado existe en la tabla de empleados
    $sql_verificar_empleado = "SELECT ID FROM empleado WHERE `ID-Empleado` = '$id_empleado'"; // Ajustar la consulta SQL
    $resultado_verificar_empleado = mysqli_query($conn, $sql_verificar_empleado);

    if (mysqli_num_rows($resultado_verificar_empleado) > 0) {
        // El empleado existe, procede con el registro de asistencia
        
        // Obtener la opción seleccionada del formulario
        $opcion = $_POST['opcion'];

        // Obtener la fecha y hora actual
        $fecha_actual = date('Y-m-d');
        $hora_actual = date('H:i:s');

        // Insertar o actualizar el registro en la tabla de asistencia según la opción seleccionada
        if ($opcion == 'entrada') {
            $sql = "INSERT INTO asistencia (`ID-Empleado`, Fecha, `Hora-Entrada`) VALUES ('$id_empleado', '$fecha_actual', '$hora_actual')";
        } elseif ($opcion == 'salida') {
            $sql = "INSERT INTO asistencia (`ID-Empleado`, Fecha, `Hora-Salida`) VALUES ('$id_empleado', '$fecha_actual', '$hora_actual')";
        }

        // Ejecutar la consulta SQL
        if (isset($sql) && mysqli_query($conn, $sql)) {
            $_SESSION['mensaje'] = "Asistencia registrada correctamente.";
        } else {
            $_SESSION['mensaje'] = "Error al registrar la asistencia: " . mysqli_error($conn);
        }
    } else {
        // El empleado no existe, mostrar mensaje de advertencia
        $_SESSION['mensaje'] = "El empleado con ID $id_empleado no existe.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    $_SESSION['mensaje'] = "No se han recibido datos del formulario.";
}

// Redirigir al usuario de vuelta a la página E-Empleados.php
header("Location: E-Empleados.php");
exit();
?>
