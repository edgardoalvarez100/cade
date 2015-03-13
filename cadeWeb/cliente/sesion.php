<?php
include("../basedatos/conectarbd.php"); 
session_start();
if(!isset($_SESSION["tipoUsuario"])){
	
		echo '<script type="text/javascript">alert("Usted no se a logueado"); location.href="../index.php";</script>';
	}else{
		if($_SESSION["tipoUsuario"] != 'cliente'){
		echo '<script type="text/javascript">alert("Usted no tiene permisos para estar aqui"); location.href="../index.php";</script>';
	}
}
?>