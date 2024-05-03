<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloj en Tiempo Real</title>
</head>
<body>
    <div id="clock" style="font-size: 26px; text-align: center; margin-top: 50px;"></div>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Convertir las horas al formato de 12 horas
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // Las 12:00 horas se representan como 12 en el formato de 12 horas
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('clock').innerText = timeString;
        }

        // Actualizar el reloj cada segundo
        setInterval(updateClock, 1000);

        // Inicializar el reloj
        updateClock();
    </script>
</body>
</html>
