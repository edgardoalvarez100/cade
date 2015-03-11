<?php

include 'basedatos/conectarbd.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = md5($_POST['password']);
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$tipo = 3;
$ciudad = $_POST['ciudad'];
$activo = 1;
$cedula = $_POST['cedula'];

$sql = "insert into usuarios values(null,'$nombre','$apellido','$correo','$password','$direccion','$telefono',$tipo,'$ciudad',$activo,'$cedula')";

mysql_query($sql, $conectar);
echo mysql_error();
if (mysql_error() == "") {
    echo "<script type='text/javascript'>alert('Registrado Exitosamente!'); location.href='index.php'; </script>";
} else {
    echo "<script type='text/javascript'>alert('Error registrando!');  </script>";
}
?>
