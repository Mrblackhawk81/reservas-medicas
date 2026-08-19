<?php

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];

echo "<h1>Datos recibidos</h1>";

echo "<p>Nombre: $nombre</p>";
echo "<p>Correo: $correo</p>";
echo "<p>Mensaje: $mensaje</p>";

?>