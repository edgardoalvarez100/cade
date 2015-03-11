<?php

include 'sesion.php';


$cedula = $_POST["cedula"];
$categoria = $_POST["idcategoria"];
$accion = $_POST["accion"];


if ($accion == "agregar") {
    $sql = "INSERT INTO categoriasempleados values($categoria, (SELECT idusuario from usuarios where cedula=$cedula))";
    $insertar = mysql_query($sql, $conectar);
    if (mysql_error() == "") {
        echo "OK";
    } else {
        echo "Error de base de datos: ".mysql_error();
    }
}
if ($accion == "eliminar") {
     $sql = "DELETE from categoriasempleados where idcategoria=$categoria AND idusuario= (SELECT idusuario from usuarios where cedula=$cedula)";
    $insertar = mysql_query($sql, $conectar);
    if (mysql_error() == "") {
        echo "OK";// en caso tal de que todo este bien, solo necesito que se imprima ok para validar
    } else {
        echo "Error de base de datos ".mysql_error();
    }
}
?>
