<?php

include "sesion.php";

date_default_timezone_set('America/Bogota');
$fecha = date("Y-m-d");
$idusuario = $_SESSION['IdUsuario'];
$idcategoria = $_POST['categoria'];
$idestado = 2;
$asunto = $_POST['asunto'];

$sql = "INSERT INTO tickets values(null, $idusuario, $idcategoria, '$fecha', $idestado, '$asunto')";
//insertamos el ticket
$insertar = mysql_query($sql, $conectar);
if (mysql_error() == "") {
    $sql = "INSERT INTO respuestas VALUES(null,'" . $_POST["mensaje"] . "',$idusuario,NOW(),LAST_INSERT_ID())";
    $insertar = mysql_query($sql, $conectar);
    if (mysql_error() == "") {
        echo "<script type='text/javascript'>alert('Nuevo Ticket Creado!'); location.href='index.php'; </script>";
    }else {
        echo "Error al agregar la respuesta";
    }
}else {
        echo "Error al crear el ticket";
    }
?>