<?php

include "sesion.php";

$buscar = "'";
$reemplazar = "";
$notifin= str_replace($buscar,$reemplazar,$_POST["mensaje"]);
$sql = "INSERT INTO respuestas
        VALUES(null,
            '" . $notifin . "',
            " . $_SESSION["IdUsuario"] . ",
            NOW()," . $_POST["idticket"] . ")";

$insertar = mysql_query($sql, $conectar);
echo mysql_error();
if (mysql_error() == "") {
    $sql = "UPDATE tickets set idestado=2 where idticket=" . $_POST["idticket"];
    mysql_query($sql, $conectar);
    echo mysql_error();
    if (mysql_error() == "") {
         echo "<script type='text/javascript'>alert('Respuesta Agregada'); location.href='responder.php?id=".$_POST["idticket"]."'; </script>";
    } else {
        echo "Error al actualizar estado del ticket";
    }
} else {
    echo "Error al insertar la respuesta";
}
?>
