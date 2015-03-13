<?php 
include('lib/nusoap.php');

function cargarServicio($nombreServicio){

switch ($nombreServicio) {
	case 'usuario':
		$client= new nusoap_client('http://localhost:8080/CADE/usuario?WSDL', 'wsdl');
		break;
	case 'ticket':
		$client = new nusoap_client('http://localhost:8080/CADE/ticket?WSDL', 'wsdl');
		break;
	case 'categoria':
		$client = new nusoap_client('http://localhost:8080/CADE/categoria?WSDL', 'wsdl');
		break;
	}

return $client;
}



?>