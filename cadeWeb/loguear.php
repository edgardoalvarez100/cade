<?php

session_start();

include("listaWS.php");
$client = cargarServicio("usuario");
$err = $client->getError();
if ($err) {
    echo 'Error en Constructor' . $err;
}


//Iniciar la sesion
if (!isset($_SESSION["Nombre"])) {
    $clave = md5($_POST["password"]);
    $param = array('correo' => $_POST["correo"], 'password' => $clave);
    $result = $client->call('loguear', $param);
    if ($client->fault) {
        echo 'Fallo';
        print_r($result);
    } else {    // Chequea errores
        $err = $client->getError();
        if ($err) {     // Muestra el error
            echo 'Error' . $err;
        } else {        // Muestra el resultado          
            $fila = $result['return'];

            if ($fila['id'] <> 0) {
                $_SESSION["Nombre"] = $fila["nombre"];
                $_SESSION["IdUsuario"] = $fila["id"];
                $_SESSION["Apellidos"] = $fila["apellidos"];
                $_SESSION["tipoUsuario"] = $fila["tipo"];
                if ($_SESSION["tipoUsuario"] == "administrador") {
                    echo '<script type="text/javascript">location.href="administrador/index.php";</script>';
                }
                if ($_SESSION["tipoUsuario"] == "empleado") {
                    echo '<script type="text/javascript">location.href="empleado/index.php";</script>';
                }
                if ($_SESSION["tipoUsuario"] == "cliente") {
                    echo '<script type="text/javascript">location.href="cliente/index.php";</script>';
                }
            } else {
                echo '<script type="text/javascript">alert("Nombre de Usuario o Clave Invalida"); location.href="index.php";</script>';
            }
        }
    }
} else {
    echo '<script type="text/javascript">alert("Nombre de Usuario o Clave Invalida"); location.href="index.php";</script>';
}
?>