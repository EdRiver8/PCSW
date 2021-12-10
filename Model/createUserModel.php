<?php
include "../Config/db.php"; //llamamos la cadena de conexion

$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$perfil = $_POST['perfil'];
$passw = $_POST['passw'];
$birthDate = $_POST['birthDate'];
$sede = $_POST['sede'];

//echo $documento, $nombre, $apellido, $perfil, $passw;

//para hacer mas seguro el formulario hacemos lo sgte, ya que en los campos pueden
//insertar sentencias sql, lo que hace es limpiar comillas y parentesis
$documento = mysqli_real_escape_string($connection, $documento);
$nombre = mysqli_real_escape_string($connection, $nombre);
$apellido = mysqli_real_escape_string($connection, $apellido);
$perfil = mysqli_real_escape_string($connection, $perfil);
$passw = mysqli_real_escape_string($connection, $passw);

/*
//encriptar las contraseñas
$hashFormat = "$2y$10$";
$salt = "encriptadoporedriver";
$hashAndSalt = $hashFormat . $salt;
$passw = crypt($passw, $hashAndSalt); //passw encriptado
*/
//echo "<br>" . $documento, $nombre, $apellido, $perfil, $passw;

$query = "INSERT INTO pcsw.users (nombre, apellido, documento, perfil, passw, fnacimiento, sede) ";
$query .= "VALUES ('$nombre', '$apellido', $documento, '$perfil', '$passw', '$birthDate', '$sede')";
//del objeto mysqli, se usa el metodo query para verificar que si se pueda ejecutar la query
if ($result = $connection->query($query)) {
    echo "\n" . 1; //1 para guardo la informacion, desde ajax lo muestra por consola
} else {
    echo "\n" . 0; //0 para no guardo la informacion
}
