<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Empleado</h1>
        <form action="agregar_empleado.php" method="POST">
            <div class="label-input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="label-input-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="label-input-group">
                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" required>
            </div>
            <div class="label-input-group">
                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" name="contacto" required>
            </div>
            <div class="label-input-group">
                <label for="departamento">Departamento:</label>
                <input type="text" id="departamento" name="departamento" required>
            </div>
            <div class="label-input-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" required>
            </div>
            <div class="label-input-group">
                <label for="salario">Salario:</label>
                <input type="number" id="salario" name="salario" required>
            </div>
            <div class="label-input-group">
                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" required>
            </div>
            <div class="label-input-group">
                <label for="id_estado_empleado">ID Estado Empleado:</label>
                <input type="number" id="id_estado_empleado" name="id_estado_empleado" required>
            </div>
            <button type="submit">Agregar Empleado</button>
        </form>
    </div>
</body>
</html>
