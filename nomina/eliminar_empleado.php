<?php
include 'Conexion.php';

if(isset($_GET['id'])) {
    $id_empleado = $_GET['id'];
    
    $sql = "DELETE FROM empleado WHERE `ID-Empleado` = '$id_empleado'";
    
    if(mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: L-Empleados.php"); // Redirigir a la página L-Empleado
        exit(); // Finalizar el script después de la redirección
    } else {
        echo "Error al eliminar el empleado: " . mysqli_error($conn);
    }
} else {
    echo "No se proporcionó el ID del empleado a eliminar.";
}

mysqli_close($conn);
?>
