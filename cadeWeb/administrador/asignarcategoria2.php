<?php
include "sesion.php";
$cedula = $_POST["cedula"];
$sql = "SELECT * from usuarios u inner join tipousuario tu on u.idtipo=tu.idtipo where activo=1 and tu.tipousuario='empleado' and u.cedula='" . $cedula . "'";
$reporte = mysql_query($sql, $conectar);
$tipo = "";
while ($rep = mysql_fetch_array($reporte)) {
    $tipo = $rep["tipousuario"];
}
if ($tipo != "empleado") {
    header("Location: asignarcategoria.php?action=1");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CADE - Mi Cuenta</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="../css/ui.all.css" rel="stylesheet" type="text/css">
        <link href="../css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/jquery.ui.core.css">
        <link rel="stylesheet" href="../css/jquery.ui.theme.css">

        <script src="../js/jquery-1.9.1.js"></script>
        <script src="../js/jquery-ui-1.10.3.custom.js"></script>
        <script src="../js/jquery.ui.core.js"></script>
        <script src="../js/jquery.ui.widget.js"></script>
        <script src="../js/jquery.ui.mouse.js"></script>
        <script src="../js/jquery.ui.draggable.js"></script>
        <script src="../js/jquery.ui.droppable.js"></script>

        <link href="../css/basic.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/demos.css">
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
        <script>
            function eliminar(cat) {
                obj = $('.seccion2[value="' + cat + '"]');
                
                imagen = obj.find('img');
                imagen.attr('src', '../images/loader.gif');//un gif para indicar que se esta eliminando
                $.post('categorias.php', {cedula: <?php echo $cedula; ?>, idcategoria: cat, accion: 'eliminar'}, function(data) {
                    if (data == 'OK') {
                        obj.remove();
                    } else {
                        imagen.attr('src', '../images/icn_alert_error.png');//se deja tal cual estaba sino se pudo eliminar el registrp
                        alert('No se pudo eliminar el registro');
                    }
                    


                });
            }


            $(function() {
                var icons = {
                    header: "ui-icon-circle-arrow-e",
                    activeHeader: "ui-icon-circle-arrow-s"
                };

                $(".seccion").draggable({
                    revert: "invalid",
                    revertDuration: 1000,
                    snap: true,
                    snapMode: "outer",
                    containment: ".contenedor",
                    delay: 300,
                    appendTo: "body",
                    helper: "clone",
                    opacity: 2.35,
                    stop: function(event, ui) {
                        $('.divContenidoRol').droppable("enable");
                    }
                });

                $(".divContenidoRol").droppable({
                    activeClass: "drop-hover",
                    hoverClass: "drop-active",
                    drop: function(event, ui) {
                        text = ui.draggable.html();
                        valor = ui.draggable.attr('value');
                        obj = $('<div></div>').addClass('seccion2');
                        obj.attr('value', valor);
                        obj.html(text).appendTo(this);
                        //mejor aqui para ir probando de una vez
                        imagen = obj.find('img');
                        imagen.attr('src', '../images/loader.gif');
                        $.post('categorias.php', {cedula: <?php echo $cedula; ?>, idcategoria: valor, accion: 'agregar'},
                        function(data) {
                            imagen.attr('src', '../images/icn_alert_error.png');
                            imagen.attr('onclick', 'eliminar(' + valor + ')');
                            if (data == 'OK') {
                                alert('Registro creado');
                            } else {
                                alert('Error al crear registro');
                                obj.remove();//sino se pudo registrar lo quitamos
                            }
                        });

                    },
                    over: function(event, ui) {
                        $('.divContenidoRol').droppable("enable");
                        valor = ui.draggable.attr('value');
                        if ($(this).find("[value='" + valor + "']").length) {
                            /*$(this).removeClass('drop-hover');*/
                            $(this).droppable("disable");
                        }
                    },
                    out: function(event, ui) {
                    }
                });
            });
        </script>
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
                <div class="divMenuPanel">
                    <div id="accordion">
                        <?php
                        $sql = "SELECT * from categorias";
                        $reporte = mysql_query($sql, $conectar);
                        while ($rep = mysql_fetch_array($reporte)) {
                            ?>
                            <div class="seccion" value="<?php echo $rep["idcategoria"]; ?>">
                                <?php echo $rep["categoria"]; ?>
                                <img src="../images/drag.png" style="float: right; cursor: move;">
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div id="DivlineaDivisionprin"></div>

                <div class="divNaviPanel">
                    <div id="divLinea1">


                        <div class="divRoles">
                            <div class="divEncabezadoRol">
                                EMPLEADO
                            </div>
                            <div class="divContenidoRol" value="<?php echo $cedula; ?>">
                                <?php
                                //consulta para obtener las categorias del empleado
                                $sqlC = "SELECT * from usuarios u 
                    INNER JOIN categoriasempleados ce ON u.idusuario=ce.idusuario 
                    INNER JOIN categorias c ON c.idcategoria=ce.idcategoria 
                    where u.cedula='" . $_POST["cedula"] . "'";

                                $reporte = mysql_query($sqlC, $conectar);

                                while ($rep1 = mysql_fetch_array($reporte)) {
                                    ?>
                                    <div class="seccion2" value="<?php echo $rep1["idcategoria"]; ?>">
                                        <?php echo $rep1["categoria"]; ?>
                                        <img src="../images/icn_alert_error.png" style="float: right; cursor: move;" onclick="eliminar(<?= $rep1["idcategoria"]; ?>)">
                                    </div>
                                
                       


                                <?php }
                                //prueba
                                ?>
                            </div>
                        </div>

                    </div>

                    <div id="DivlineaDivision"></div>


                </div>


            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="footerbar">

            <div class="right">Copyright © <a href="#" target="_blank">8AN</a>.  All Rights Reserved.</div>
        </div>
    </body>
</html>
