<?php

include("listaWS.php");


$err = $client->getError();
if ($err) {
    echo 'Error en Constructor ' . $err;
}
 

$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = md5($_POST['password']);
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$tipo = 3;
$ciudad = $_POST['ciudad'];
$activo = 1;
$cedula = $_POST['cedula'];

$usuario = array('nombre' => $nombre, 'apellidos' =>$apellido, 'correo'=>$correo, 'password'=>$password,'direccion'=>$direccion, 
	'telefono'=>$telefono, 'tipo'=>$tipo, 'ciudad'=>$ciudad, 'activo'=>$activo, 'cedula'=>$cedula);
$param = array('usuario' => $usuario);
$resultado=$client->call('registrar',$param);
print_r($resultado);



//if (mysql_error() == "") {
 //   echo "<script type='text/javascript'>alert('Registrado Exitosamente!'); location.href='index.php'; </script>";
//} else {
 //   echo "<script type='text/javascript'>alert('Error registrando!');  </script>";
//}
?>
