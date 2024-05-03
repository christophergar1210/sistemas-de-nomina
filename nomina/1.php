

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Nómina</title>

    <link rel="stylesheet" type="text/css" href="css.css">
    <link rel="shortcut icon" href="/Nomina.png" />
    <script src="menu.js" defer></script>

</head>
<body>
    
<div class="dashboard">
    <h2>Opciones</h2>
    <H3>
    <ul>
    <li><a href="principal.php" id="principal-link">Principal</a></li>
    <div id="principal-options" style="display: none;">
        <!-- Contenido de las opciones de la página principal -->
    </div> <br><br>

    <li><a href="#" id="nomina-link">Nomina</a></li>
    <div id="nomina-options" style="display: none;">
        <ul>
            <li><a href="1.php">Nomina de empleado</a></li><br>
            <li><a href="#">Opción 2</a></li>
            <!-- Agrega más opciones según sea necesario -->
        </ul>
    </div> <br><br>

    <li><a href="#" id="empleados-link">Empleados</a></li>
    <div id="empleados-options" style="display: none;">
        <ul>
            <li><a href="empleados.php">Asistencia</a></li><br>
            <li><a href="L-Empleados.php">Lista de empleados</a></li>
            <!-- Agrega más opciones según sea necesario -->
        </ul>
    </div><br><br>
    <li><a href="Horarios.php" id="horarios-link">Horarios</a></li>
    <div id="horarios-options" style="display: none;">
        <!-- Contenido de las opciones de horarios -->
    </div> <br><br>
</ul>


    <form action="cerrar_sesion.php" method="post">
    <button type="submit">Cerrar Sesión</button>
    </form>
 </H3>
</div>


    <div class="container">
        <h1>Formulario de Nómina</h1>
        <form method="post" action="calcular_nomina.php">
            <div class="row">
                <div class="column">
                    <div class="label-input-group">
                        <label for="tipo_liquidacion">Tipo de Liquidación:</label>
                        <input type="text" id="tipo_liquidacion" name="tipo_liquidacion">
                    </div>
                    <div class="label-input-group">
                        <label for="domicilio">Domicilio:</label>
                        <input type="text" id="domicilio" name="domicilio">
                    </div>
                    <div class="label-input-group">
                        <label for="empleado">Empleado:</label>
                        <input type="text" id="empleado" name="empleado">
                    </div>
                    <div class="label-input-group">
                        <label for="cargo">Cargo:</label>
                        <input type="text" id="cargo" name="cargo">
                    </div>
                </div>
                <div class="column">
                    <div class="label-input-group">
                        <label for="centro_trabajo">Centro de Trabajo:</label>
                        <input type="text" id="centro_trabajo" name="centro_trabajo">
                    </div>
                    <div class="label-input-group">
                        <label for="devengo">Devengo:</label>
                        <input type="number" id="devengo" name="devengo">
                    </div>
                    <div class="label-input-group">
                        <label for="deducidos">Deducidos:</label>
                        <input type="number" id="deducidos" name="deducidos">
                    </div>
                    <div class="label-input-group">
                        <label for="sueldo">Sueldo:</label>
                        <input type="number" id="sueldo" name="sueldo">
                    </div>
                </div>
                <div class="column">
                    <div class="label-input-group">
                        <label for="comisiones">Comisiones:</label>
                        <input type="number" id="comisiones" name="comisiones">
                    </div>
                    <div class="label-input-group">
                        <label for="total_deducido">Total Deducido:</label>
                        <input type="number" id="total_deducido" name="total_deducido">
                    </div>
                    <div class="label-input-group">
                        <label for="neto_pagado">Neto Pagado:</label>
                        <input type="number" id="neto_pagado" name="neto_pagado">
                    </div>
                </div>
                <div class="column">
                    <div class="label-input-group">
                        <label for="ISR">ISR:</label>
                        <input type="number" id="ISR" name="ISR">
                    </div>
                    <div class="label-input-group">
                        <label for="SFS">SFS:</label>
                        <input type="number" id="SFS" name="SFS">
                    </div>
                    <div class="label-input-group">
                        <label for="AFP">AFP:</label>
                        <input type="number" id="AFP" name="AFP">
                    </div>
                    <div class="label-input-group">
                        <label for="dependientes">Dependientes:</label>
                        <input type="number" id="dependientes" name="dependientes">
                    </div>
                </div>
            </div>
            <input id="submit" type="submit" value="Calcular Nómina">
        </form>
        <p class="note">* Todos los campos son obligatorios</p>
    </div>
    
</body>
<script>
document.getElementById("submit").addEventListener("click", function() {window.print();});
</script>

</html>
