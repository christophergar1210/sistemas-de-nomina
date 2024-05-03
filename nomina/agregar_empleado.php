<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $departamento = $_POST['departamento'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $id_estado_empleado = $_POST['id_estado_empleado'];

    // Insertar los datos del nuevo empleado en la base de datos
    $sql = "INSERT INTO empleado (Nombre, Apellido, Genero, Departamento, Cargo, Salario, `Fecha-Ingreso`, id_estado_empleado) 
            VALUES ('$nombre', '$apellido', '$genero', '$departamento', '$cargo', '$salario', '$fecha_ingreso', '$id_estado_empleado')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: L-Empleados.php"); // Redirigir a la página L-Empleado
        exit(); // Finalizar el script después de la redirección
    } else {
        echo "Error al agregar el empleado: " . mysqli_error($conn);
    }
}
?>
