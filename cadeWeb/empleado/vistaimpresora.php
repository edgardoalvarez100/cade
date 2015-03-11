<?php
include 'sesion.php';
$id = $_GET["id"];
$sql = "SELECT * from tickets t INNER JOIN categorias c ON t.idcategoria=c.idcategoria INNER JOIN estadotickets et ON t.idestado=et.idestado WHERE idticket=$id ";
$sqlrespuestas = "SELECT  u.nombre as unombre, u.apellidos as uapellidos, tipousuario, r.fecha as fechares, respuesta  FROM respuestas r 
    INNER JOIN tickets t ON r.idticket= t.idticket 
    INNER JOIN usuarios u ON r.idusuario=u.idusuario 
                            INNER JOIN tipousuario tu ON u.idtipo=tu.idtipo WHERE t.idticket=$id ORDER BY r.fecha ASC";
?>
<html>
    <head>
        <title>CADE - Vista del ticket para imprimir</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="../css/ui.all.css" rel="stylesheet" type="text/css" />


    </head>
    <body style="margin:0px">

        <table width="100%" bgcolor="#ffffff" cellpadding="15"><tr><td>

                    <h2>Vista del ticket para imprimir</h2>
                    <?php
                    $reporte = mysql_query($sql, $conectar);
                    while ($rep = mysql_fetch_array($reporte)) {
                        ?>
                        <p><b><?php echo $rep["asunto"];
                        ?></b></p>

                        <p><b><i>Ticket ID:</i></b> #<?php echo $id; ?><br>
                            <b><i>Departmento:</i></b> <?php echo $rep["categoria"]; ?><br>
                            <b><i>Fecha de creación:</i></b> <?php echo $rep["fecha"]; ?><br>
                            <b><i>Estado:</i></b> <?php echo $rep["estado"]; ?><br>
                        <?php } ?>
                    <hr size=1><p>
                    </p>
                    <?php
                    $reporte = mysql_query($sqlrespuestas, $conectar);
                    while ($rep = mysql_fetch_array($reporte)) {
                        ?>

                        <hr size=3>

                        <b><?php echo $rep['unombre'] . ' ' . $rep['uapellidos']; ?></b> @ <?php echo $rep['fechares']; ?><br><hr size=1><br><?php echo $rep['respuesta'] ?><br />


                        <hr size=1>
                    <?php } ?>
                    <p align=center style="font-size:10px;"> 
                    <form>
                        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
                    </form></p>

                </td></tr></table>



    </body>
</html>