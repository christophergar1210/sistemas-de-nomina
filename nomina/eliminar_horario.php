<?php
include 'Conexion.php';

if(isset($_GET['id'])) {
    $id_horario = $_GET['id'];
    
    $sql = "DELETE FROM horarios WHERE `id` = '$id_horario'";
    
    if(mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: Horarios.php"); // Redirigir a la página L-Empleado
        exit(); // Finalizar el script después de la redirección
    } else {
        echo "Error al eliminar el Horario: " . mysqli_error($conn);
    }
} else {
    echo "No se proporcionó el ID del Horario a eliminar.";
}

mysqli_close($conn);
?>
