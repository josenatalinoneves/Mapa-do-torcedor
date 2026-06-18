<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "mapa_do_torcedor");

$result = $conn->query("SELECT * FROM locais WHERE aprovado = TRUE");

$locais = [];
while ($row = $result->fetch_assoc()) {
    $locais[] = $row;
}

echo json_encode($locais);
?>