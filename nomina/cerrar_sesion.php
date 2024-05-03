<?php
session_start();

$_SESSION['logged_out'] = true;
// Redirigir a la página de inicio de sesión u otra página después de cerrar sesión
header("Location: login.php");
exit;
?>
