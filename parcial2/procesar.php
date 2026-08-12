<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$sabores = $_POST["sabores"];

$carta = [
    "Cono simple - Bs 8",
    "Copa doble - Bs 15",
    "Litro para llevar - Bs 35"
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido recibido - Heladería Doña Nieve</title>
</head>
<body>

    <?php
    echo "<h1>Pedido recibido en Heladería Doña Nieve</h1>";

    echo "<p>Nombre: " . $nombre . "</p>";
    echo "<p>Correo: " . $correo . "</p>";
    echo "<p>Sabores: " . $sabores . "</p>";

    echo "<ul>";
    foreach ($carta as $producto) {
        echo "<li>" . $producto . "</li>";
    }
    echo "</ul>";

    echo "<p>Te atiende Cristian Israel Alarcon Saigua</p>";
    ?>

</body>
</html>