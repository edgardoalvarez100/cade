
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<div id="logo"><a href="index.php"><img src="images/logo.png" alt="CADE" border="0" /></a></div>
<div id="login_container">
<div id="login_msg"><span style="font-size:14px;"><strong>Nuevo Usuario</strong></span><br>
  Por favor, introduzca sus datos  a continuación para registrarse.</div>  
<div id="login">
    <form action="agregarusuarioWS.php" method="post" name="frmlogin" id="frmlogin">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Nombre</strong></td>
          <td align="left" valign="middle"><input type="text" name="nombre" size="30" class="login_inputs" required /></td>
        </tr>
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Apellidos</strong></td>
          <td align="left" valign="middle"><input type="text" name="apellidos" size="30" class="login_inputs" required /></td>
        </tr>
          <tr>
          <td width="30%" align="right" valign="middle"><strong>Cedula</strong></td>
          <td align="left" valign="middle"><input type="text" name="cedula" size="30" class="login_inputs" required /></td>
        </tr>
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Correo electronico</strong></td>
          <td align="left" valign="middle"><input type="email" name="correo" size="30" class="login_inputs" required /></td>
        </tr>
        
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Contraseña</strong></td>
          <td align="left" valign="middle"><input type="password" name="password" size="30" class="login_inputs" required /></td>
        </tr>
          <tr>
          <td width="30%" align="right" valign="middle"><strong>Telefono</strong></td>
          <td align="left" valign="middle"><input type="text" name="telefono" size="30" class="login_inputs" required /></td>
        </tr>
          <tr>
          <td width="30%" align="right" valign="middle"><strong>Direccion</strong></td>
          <td align="left" valign="middle"><input type="text" name="direccion" size="30" class="login_inputs" required /></td>
        </tr>
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Ciudad</strong></td>
          <td align="left" valign="middle"><input type="text" name="ciudad" size="30" class="login_inputs" required /></td>
        </tr>
        <tr>
          <td width="30%" align="right" valign="middle">&nbsp;</td>
          <td align="left" valign="middle"><table width="100%" cellpadding="0" cellspacing="0"><tr><td><input type="submit" value="Entrar" class="button" /></td>
          <td align="right">  </td></tr></table></td>
        </tr>
      </table>
    </form>
  </div>
  <div id="extra_info">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="middle">Su IP : <strong><?php echo $_SERVER['REMOTE_ADDR'];?></strong></td>
        <td align="right" valign="middle">Desarrollado por <a href="http://www.plussoluciones.com/" target="_blank">8AN</a></td>
      </tr>
    </table>
  </div>
</div>
<!--<div align="center"><a href="registro.php">Registrarse</a></div>-->
<script type="text/javascript">
$("form input:text:visible:first").focus();
</script>
</body>
</html>