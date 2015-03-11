<?php

include "sesion.php";
$ciudad = $_POST["ciudad"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$direccion = $_POST["direccion"];
$tipo = $_POST["tipo"];
$cedula = $_POST["cedula"];

if (isset($_POST["pass1"])) {
    if ($_POST["pass1"] != "") {

        $password = md5($_POST["pass1"]);
        $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', password='$password', correo='$correo', ciudad='$ciudad', idtipo=$tipo WHERE cedula='" . $cedula . "'";
        mysql_query($sql, $conectar);
        echo mysql_error();
        if (mysql_error() == "") {
            echo "<script type='text/javascript'> alert('Usuario Actualizado'); location.href='index.php'; </script>";
        } else {
            echo "Error al actualizar";
        }
    } else {
        $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', direccion='$direccion',  correo='$correo', ciudad='$ciudad', idtipo=$tipo WHERE cedula='" . $cedula . "'";
        mysql_query($sql, $conectar);
        echo mysql_error();
        if (mysql_error() == "") {
            echo "<script type='text/javascript'>alert('Usuario Actualizado'); location.href='index.php'; </script>";
        } else {
            echo "Error al actualizar";
        }
    }
} else {
    echo "";
}
?>
