<?php
include 'Conexion.php';

// Variable para almacenar el mensaje de éxito o error
$mensaje = "";

// Verificar si se ha enviado el formulario de adición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $T_entrada = $_POST['entrada'];
    $T_salida = $_POST['salida'];

    // Insertar los datos del horario en la base de datos
    $sql = "INSERT INTO horarios (`T-entrada`, `T-salida`) VALUES ('$T_entrada', '$T_salida')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: Horarios.php"); // Redirigir a Horarios.php
        exit();
    } else {
        echo "Error al agregar el Horario: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Horario</title>
    <style>
        /* CSS */
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        .container h1 {
            text-align: center;
        }

        .label-input-group {
            margin-bottom: 15px;
        }

        .label-input-group label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        .label-input-group input[type="time"] {
            width: 200px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .button-group {
            text-align: center;
        }

        .button-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Horario</h1>
        <?php if (!empty($mensaje)) { ?>
            <p><?php echo $mensaje; ?></p>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="label-input-group">
                <label for="entrada">Hora de Entrada:</label>
                <input type="time" id="entrada" name="entrada" required><br><br>
            </div>
            <div class="label-input-group">
                <label for="salida">Hora de Salida:</label>
                <input type="time" id="salida" name="salida" required><br><br>
            </div>
            <div class="button-group">
                <button type="submit">Agregar Horario</button>
            </div>
        </form>
    </div>
</body>
</html>
