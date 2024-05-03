<?php
$db_host="localhost"; //localhost server 
$db_user="root";	//database username
$db_password="";	//database password   
$db_name="nomina";	//database name

$conn = mysqli_connect($db_host, $db_user , $db_password, $db_name);
if (!$conn)
{
    echo "Conexion fallida";
}


?>