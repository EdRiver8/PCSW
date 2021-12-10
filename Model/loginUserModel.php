<?php
include "../Config/db.php"; //llamamos la cadena de conexion

$userName = $_POST['userName'];
$passw = $_POST['passw'];
$data = [];

//para hacer mas seguro el formulario hacemos lo sgte, ya que en los campos pueden
//insertar sentencias sql, lo que hace es limpiar comillas y parentesis
$userName = mysqli_real_escape_string($connection, $userName);
$passw = mysqli_real_escape_string($connection, $passw);


$query = "SELECT nombre, apellido, documento, perfil, passw ";
$query .= "FROM users WHERE passw = '$passw' and nombre = '$userName'";
$result = $connection->query($query);
while ($row = mysqli_fetch_object($result)) {
    $data[] = $row; //cada registro(fila) de la db, lo guardo en el arreglo
}

echo json_encode($data);//se muestra la info obtenida en la consulta en objetos tipos json
