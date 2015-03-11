<?php
$conectar = mysql_connect("plussoluciones.com","probando_cade","trew2345.");
mysql_select_db("probando_cade",$conectar);
if(!$conectar){
    echo "Conexion NO exitosa";
    echo mysql_error();
}

?>
