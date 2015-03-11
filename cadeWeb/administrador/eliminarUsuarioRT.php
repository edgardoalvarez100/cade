<?php
include "sesion.php";

$estado=0;
$cedula=$_POST["cedula"];

if (isset($_POST["pass1"])) {
    $password=  md5($_POST["pass1"]);
    $sql = "UPDATE usuarios SET activo='$estado' WHERE cedula='".$cedula."'";
    mysql_query($sql, $conectar);
     echo mysql_error();
      if (mysql_error() == "") {
         echo "<script type='text/javascript'> alert('Usuario Eliminado'); location.href='index.php'; </script>";
    } else {
        echo "Error al eliminar el usuario";
    }
} else {
    $sql = "UPDATE usuarios SET activo='$estado' WHERE cedula='".$cedula."'";
    mysql_query($sql, $conectar);
     echo mysql_error();
      if (mysql_error() == "") {
         echo "<script type='text/javascript'>alert('Usuario Eliminado'); location.href='index.php'; </script>";
    } else {
        echo "Error al eliminar el usuario";
    }
}
?>
