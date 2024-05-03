<?php

include 'Conexion.php';

session_start();

// Verificar si el usuario intentó cerrar sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Destruir la sesión y redirigir al usuario a la página de inicio de sesión
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['username'])) {
    // Si el usuario ya ha iniciado sesión, redirigir al panel de control
    header("Location: principal.php");
    exit;
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = '$username'";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $hashed_password = $fila['password'];
        
        if (password_verify($password, $hashed_password)) {
            // Iniciar sesión y redirigir al usuario al panel de control
            $_SESSION['username'] = $username;
            header("Location: principal.php"); 
            exit;
        } else {
            // Contraseña incorrecta
            echo "<p>La contraseña es incorrecta. Por favor, inténtelo de nuevo.</p>";
        }
    } else {
        // Usuario no encontrado
        echo "<p>El usuario no existe. Por favor, registre una cuenta.</p>";
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>  
    
    <center>
        <br><br>
        <?php
        include 'clock.php';
        ?>
        <div class="login-container">
            <h2>Iniciar sesión</h2>
            <form action="1.php" method="POST">
                <div class="login-label-input-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" placeholder='Ingrese el usuario' required>
                </div>

                <div class="login-label-input-group "> 
                    <label for="password">Contraseña:</label>
                    <br>
                    <input type="password" id="password" name="password" placeholder='Ingrese la contraseña' required>
                </div>

                <div class="form-group">
                    <button type="submit">Iniciar sesión</button> 
                </div>

            </form> 
        </div>
    </center>

    <script>
        window.addEventListener("pageshow", function (event) {
            var form = document.querySelector("form");
            if (event.persisted) {
                form.reset();
            }
        });
    </script>

<script>
        window.onload = function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        };
</script>

</body>
</html>
