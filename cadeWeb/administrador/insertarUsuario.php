<?php
include_once("sesion.php");


$estado = 1;
$pass = $_POST["pass1"];
$cl = md5($pass);
$sql = "INSERT INTO usuarios
        VALUES(null,
            '" . $_POST["nombre"] . "',
            '" . $_POST["apellidos"] . "',
            '" . $_POST["correo"] . "',
            '$cl',
            '" . $_POST["direccion"] . "',
            '" . $_POST["telefono"] . "',
            '" . $_POST["tipo"] . "',    
            '" . $_POST["ciudad"] . "',
            '$estado',
                '" . $_POST["cedula"] . "'
            
        )";

$insertar = mysql_query($sql, $conectar);
echo mysql_error();
if (mysql_error() == "") {
    echo "<script type='text/javascript'>alert('Registro Insertado'); location.href='index.php'; </script>";
} else {
    echo "Error de base de datos";
}
?>