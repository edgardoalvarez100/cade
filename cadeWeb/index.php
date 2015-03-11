<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CADE - Ingresar</title>
        <link href="css/ui.all.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            body {
                margin: 0;
                background-color: #F4F4F4;
                background-image: url('images/loginbg.gif');
                background-repeat: repeat-x;
            }
            body, td, th {
                font-family: Tahoma, Arial, Helvetica, sans-serif;
                font-size: 12px;
                color: #333;
            }
            a, a:visited {
                color: #000066;
                text-decoration: underline;
            }
            a:hover {
                text-decoration: none;
            }
            form {
                margin: 0;
                padding: 0;
            }
            input, select {
                font-family: Tahoma, Arial, Helvetica, sans-serif;
                font-size: 16px;
            }
            .login_inputs {
                padding: 3px;
                border: 1px solid #ccc;
                font-size: 12px;
            }
            #logo {
                text-align: center;
                width: 420px;
                margin: 30px auto 10px auto;
                padding: 15px;
            }
            #login_container {
                color: #333;
                background-color: #fff;
                text-align: left;
                width: 430px;
                padding: 10px;
                margin: 0 auto 10px auto;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
                -o-border-radius: 10px;
                border-radius: 10px;
            }
            #login_container #login {
                text-align: left;
                margin: 0;
                padding: 20px 10px 20px 10px;
            }
            #login_container #login_msg {
                background-color: #FAF4B8;
                text-align: center;
                padding: 10px;
                margin: 0 0 1px 0;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
                -o-border-radius: 10px;
                border-radius: 10px;
            }
            #login_container #extra_info {
                background-color: #D3D3D3;
                text-align: left;
                padding: 10px;
                margin: 1px 0 0 0;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
                -o-border-radius: 10px;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <div id="logo"><a href="index.php"><img src="images/logo.png"  border="0" /></a></div>
        <div id="login_container">
            <div id="login_msg"><span style="font-size:14px;"><strong>Bienvenido nuevamente</strong></span><br>
                Por favor, introduzca sus datos de acceso a continuación para autenticar.</div>  <div id="login">
                <form action="loguear.php" method="post" name="frmlogin" id="frmlogin">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                            <td width="30%" align="right" valign="middle"><strong>Correo</strong></td>
                            <td align="left" valign="middle"><input type="text" name="correo" size="30" class="login_inputs" /></td>
                        </tr>
                        <tr>
                            <td width="30%" align="right" valign="middle"><strong>Contraseña</strong></td>
                            <td align="left" valign="middle"><input type="password" name="password" size="30" class="login_inputs" /></td>
                        </tr>

                        <tr>
                            <td width="30%" align="right" valign="middle">&nbsp;</td>
                            <td align="left" valign="middle"><table width="100%" cellpadding="0" cellspacing="0"><tr><td><input type="submit" value="Entrar" class="button" /></td>
                                        <td align="right">  </td></tr></table></td>
                        </tr>
                        <tr>
                            <td width="30%" align="right" valign="middle">&nbsp;</td>
                            <td align="left" valign="middle"><table width="100%" cellpadding="0" cellspacing="0"><tr><td><a href="registro.php">Registrarse</a></td>
                                        <td align="right">  </td></tr></table></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="extra_info">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="left" valign="middle">Su IP : <strong><?php echo $_SERVER['REMOTE_ADDR']; ?></strong></td>
                        <td align="right" valign="middle">Desarrollado por <a href="http://www.plussoluciones.com/" target="_blank">8AN</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <script type="text/javascript">
            $("form input:text:visible:first").focus();
        </script>
    </body>
</html>