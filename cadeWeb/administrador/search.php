<?php
include 'sesion.php';
$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends

$sql = "SELECT cedula as value, idusuario FROM usuarios WHERE cedula LIKE '%".$term."%' AND activo=1";
$result = mysql_query($sql, $conectar);
while ($row = mysql_fetch_array($result))//loop through the retrieved values
{
		$row['value']=htmlentities(stripslashes($row['value']));
		$row['id']=(int)$row['idusuario'];
		$row_set[] = $row;//build an array
}
echo json_encode($row_set);
?>
