<?php
include "../conexion/bdnautica.php";


// Consulta SELECT para obtener los viajes de los barcos
$sql = "SELECT * FROM viaje";
$stmt = $pdo->query($sql);
$tablaViajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>