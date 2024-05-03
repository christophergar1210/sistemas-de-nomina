<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de Empleado</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>

    <center>
        <br><br>
        <?php
        include 'clock.php';
        ?>
        <div class="login-container">
            <h2>Entrada Empleado</h2>
            <!-- El formulario debe enviar los datos a un script PHP -->
            <form action="procesar_empleado.php" method="post">
                <div class="login-label-input-group">
                    <label for="ID-Empleado">ID del Empleado:</label>
                    <input type="text" id="ID-Empleado" name="ID-Empleado" placeholder="Ingrese el ID del empleado" required>
                </div>
                <div class="login-label-input-group">
                    <label for="opcion">Opción:</label>
                    <select id="opcion" name="opcion" required>
                        <option value="entrada">Registrar Entrada</option>
                        <option value="salida">Registrar Salida</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Registrar asistencia</button>
                </div>

                <?php
                session_start();
                // Verificar si hay un mensaje almacenado en la variable de sesión
                if (isset($_SESSION['mensaje'])) {
                    // Mostrar el mensaje y luego limpiar la variable de sesión
                    echo "<p>{$_SESSION['mensaje']}</p>";
                    unset($_SESSION['mensaje']);
                }
                ?>
            </form>

        </div>
    </center>

</body>

</html>