<?php
include "sesion.php";

$id = $_GET["id"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CADE - Responder Ticket</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="../css/ui.all.css" rel="stylesheet" type="text/css">
        <style>
            .text-core {
                position: relative;
            }
            .text-core .text-wrap {
                background: #fff;
                position: absolute;
            }
            .text-core .text-wrap textarea, .text-core .text-wrap input {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
                border: 1px solid #9daccc;
                outline: none;
                resize: none;
                position: absolute;
                z-index: 1;
                background: none;
                overflow: hidden;
                margin: 0;
                padding: 3px 5px 4px 5px;
                white-space: nowrap;
                font: 11px "lucida grande", tahoma, verdana, arial, sans-serif;
                line-height: 13px;
                height: auto;
            }
            .text-core .text-wrap .text-arrow {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                position: absolute;
                top: 0;
                right: 0;
                width: 22px;
                height: 22px;
                background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAOAQMAAADHWqTrAAAAA3NCSVQICAjb4U/gAAAABlBMVEX///8yXJnt8Ns4AAAACXBIWXMAAAsSAAALEgHS3X78AAAAHHRFWHRTb2Z0d2FyZQBBZG9iZSBGaXJld29ya3MgQ1MzmNZGAwAAABpJREFUCJljYEAF/xsY6hkY7BgYZBgYOFBkADkdAmFDagYFAAAAAElFTkSuQmCC") 50% 50% no-repeat;
                cursor: pointer;
                z-index: 2;
            }
            .text-core .text-wrap .text-dropdown {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 0;
                position: absolute;
                z-index: 3;
                background: #fff;
                border: 1px solid #9daccc;
                width: 100%;
                max-height: 100px;
                padding: 1px;
                font: 11px "lucida grande", tahoma, verdana, arial, sans-serif;
                display: none;
                overflow-x: hidden;
                overflow-y: auto;
            }
            .text-core .text-wrap .text-dropdown.text-position-below {
                margin-top: 1px;
            }
            .text-core .text-wrap .text-dropdown.text-position-above {
                margin-bottom: 1px;
            }
            .text-core .text-wrap .text-dropdown .text-list .text-suggestion {
                padding: 3px 5px;
                cursor: pointer;
            }
            .text-core .text-wrap .text-dropdown .text-list .text-suggestion em {
                font-style: normal;
                text-decoration: underline;
            }
            .text-core .text-wrap .text-dropdown .text-list .text-suggestion.text-selected {
                color: #fff;
                background: #6d84b4;
            }
            .text-core .text-wrap .text-focus {
                -webkit-box-shadow: 0px 0px 6px #6d84b4;
                -moz-box-shadow: 0px 0px 6px #6d84b4;
                box-shadow: 0px 0px 6px #6d84b4;
                position: absolute;
                width: 100%;
                height: 100%;
                display: none;
            }
            .text-core .text-wrap .text-focus.text-show-focus {
                display: block;
            }
            .text-core .text-wrap .text-prompt {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                position: absolute;
                width: 100%;
                height: 100%;
                margin: 1px 0 0 2px;
                font: 11px "lucida grande", tahoma, verdana, arial, sans-serif;
                color: #c0c0c0;
                overflow: hidden;
                white-space: pre;
            }
            .text-core .text-wrap .text-prompt.text-hide-prompt {
                display: none;
            }
            .text-core .text-wrap .text-tags {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                position: absolute;
                width: 100%;
                height: 100%;
                padding: 3px 10px 3px 3px;
                cursor: text;
            }
            .text-core .text-wrap .text-tags.text-tags-on-top {
                z-index: 2;
            }
            .text-core .text-wrap .text-tags .text-tag {
                float: left;
            }
            .text-core .text-wrap .text-tags .text-tag .text-button {
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                position: relative;
                float: left;
                border: 1px solid #9daccc;
                background: #e2e6f0;
                color: #000;
                padding: 0px 17px 0px 3px;
                margin: 0 2px 2px 0;
                cursor: pointer;
                height: 16px;
                font: 11px "lucida grande", tahoma, verdana, arial, sans-serif;
            }
            .text-core .text-wrap .text-tags .text-tag .text-button a.text-remove {
                position: absolute;
                right: 3px;
                top: 2px;
                display: block;
                width: 11px;
                height: 11px;
                background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAhCAYAAAAPm1F2AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAAB50RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNS4xqx9I6wAAAQ5JREFUOI2dlD0WwiAQhCc8L6HHgAPoASwtSYvX8BrQxtIyveYA8RppLO1jE+LwE8lzms2yH8MCj1QoaBzH+VuUYNYMS213UlvDRamtUbXb5ZyPHuDoxwGgip3ipfvGuGzPz+vZ/coDONdzFuYCO6ramQQG0DJIE1oPBBvM6e9LqaS2FwD7FWwnVoIAsOc2Xn1jDlyd8pfPBRVOBHA8cc/3yCmQqt0jcY4LuTyAF3pOYS6wI48LAm4MUrx5JthgSQJAt5LtNgAUgEMBBIC3AL2xgo58dEPfhE9wygef89FtCeC49UwltR1pQrK2qr9vNr7uRTCBF3pOYS6wI4/zdQ8MUpxPI9hgSQL0Xyio/QBt54DzsHQx6gAAAABJRU5ErkJggg==") 0 0 no-repeat;
            }
            .text-core .text-wrap .text-tags .text-tag .text-button a.text-remove:hover {
                background-position: 0 -11px;
            }
            .text-core .text-wrap .text-tags .text-tag .text-button a.text-remove:active {
                background-position: 0 -22px;
            }
        </style>

        <link href="../css/tooltip.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="topbar">
            <div class="left"><a href="index.php">Inicio</a> | <a href="myaccount.php">Mi cuenta</a> | <a href="../salir.php">Salir</a></div>
            <div class="right date">
                <?
                date_default_timezone_set("America/bogota");
                echo date("l, j F Y H:i");
                ?>
            </div>
        </div>
        <div class="header">
            <div class="logo"><a href="index.php"><img src="../images/logo-interno.png" border="0"></a></div>
        </div>
        <div class="navigation">
            <?php include ("menu.php") ?>
        </div>
        <br>
        <div class="contentarea" id="contentarea">
            <div style="float:left;width:100%;">

                <h1>Tickets</h1>
                <?php
                $sql = "SELECT * FROM tickets  WHERE idticket=$id";
                $reporte = mysql_query($sql, $conectar);
                while ($rep = mysql_fetch_array($reporte)) {
                    $estadot = $rep['idestado']
                    ?>
                    <div id="replyingadmin">
                    </div>

                    <h2>#<?php echo $rep['idticket'] . ' - ' . $rep['asunto']; ?> -- 
                        <?php if ($estadot != 3) {
                            ?> <a href="cerrarticket.php?id=<?php echo $id; ?>">Cerrar Ticket</a><?php } ?></h2>


                <?php } ?>






                <br />




                <div id="ticketreplies">


                    <?php
                    $sql = "SELECT  u.nombre as unombre, u.apellidos as uapellidos, tipousuario, r.fecha as fechares, respuesta  FROM respuestas r INNER JOIN tickets t ON r.idticket= t.idticket INNER JOIN usuarios u ON r.idusuario=u.idusuario 
                            INNER JOIN tipousuario tu ON u.idtipo=tu.idtipo WHERE t.idticket=$id ORDER BY r.fecha ASC ";
                    $reporte = mysql_query($sql, $conectar);
                    while ($rep = mysql_fetch_array($reporte)) {

                        if ($rep['tipousuario'] == 'empleado') {
                            echo '<div class="staffreply">

                            <div class="leftcol">

                                <div class="submitter">


                                    <div class="name">' . $rep['unombre'] . ' ' . $rep['uapellidos'] . '</div>
                                    <div class="title">Empleado</div>

                                    <br />


                                </div>

                               

                            </div>
                            <div class="rightcol">


                                <div class="postedon">Publicado el ' . $rep['fechares'] . '</div>

                                <div class="msgwrap" id="contentr1">

                                    <div class="message">
                                        <br />
                                        <br />
                                       ' . $rep['respuesta'] . '
                                    </div>


                                </div>

                            </div>
                            <div class="clear"></div>

                        </div>';
                        }
                        if ($rep['tipousuario'] == 'cliente') {
                            echo '
                                <div class="reply">
                            <div class="leftcol">

                                <div class="submitter">


                                    <div class="name"><a href="#">' . $rep['unombre'] . ' ' . $rep['uapellidos'] . '</a></div>

                                    <div class="title">
                                        Cliente
                                    </div>
                                </div>

                            </div>
                            <div class="rightcol">


                                <div class="postedon">Publicado el ' . $rep['fechares'] . '</div>

                                <div class="msgwrap" id="contentt1">

                                    <div class="message">' . $rep['respuesta'] . '
                                    </div>


                                </div>

                            </div>
                            <div class="clear"></div>

                                </div>';
                        }
                    }
                    ?>

                </div>
                <?php
                if ($estadot != 3) {
                    ?>
                    <div id="tab0box" class="tabbox">
                        <div id="tab_content">

                            <form method="post" action="agregarrespuesta.php" enctype="multipart/form-data" name="replyfrm" id="replyfrm">

                                <input name="idticket" type="hidden" value="<?php echo $id; ?>"/>
                                <textarea name="mensaje" id="mensaje" rows="14" style="width:100%;margin:0 0 10px 0;" required ></textarea>

                                <table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
                                    <tr><td width="15%" class="fieldlabel">Enviar</td><td class="fieldarea">

                                            <input type="submit" value="Añadir respuesta &raquo;" name="postreply" class="btn-primary" id="postreplybutton" />

                                        </td></tr>
                                </table>

                            </form>

                        </div>
                    </div>
                <?php } ?>

                <p align="center"><a href="vistaimpresora.php?id=<?php echo $id; ?>" target="_blank">Vista para impresora</a></p>





            </div>
            <div class="clear"></div>

        </div>


        <div class="clear"></div>
        <div class="footerbar">

            <div class="right">Copyright © <a href="#" target="_blank">8AN</a>.  All Rights Reserved.</div>
        </div>
    </body>
</html>