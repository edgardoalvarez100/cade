<?php

include "sesion.php";

$sql = "INSERT INTO respuestas
        VALUES(null,
            '------------ Ticket Cerrado --------------',
            " . $_SESSION["IdUsuario"] . ",
            NOW()," . $_GET["id"] . ")";

$insertar = mysql_query($sql, $conectar);
echo mysql_error();



$sql = "UPDATE tickets set idestado=3 where idticket=" . $_GET["id"];
mysql_query($sql, $conectar);
echo mysql_error();
if (mysql_error() == "") {
    echo "<script type='text/javascript'>alert('Ticket Cerrado Correctamente!'); location.href='index.php'; </script>";
} else {
    echo "Error al cerrar ticket!";
}
?>
