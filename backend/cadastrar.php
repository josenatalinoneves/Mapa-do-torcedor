<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$conn = new mysqli("localhost", "root", "", "mapa_do_torcedor");

$dados = json_decode(file_get_contents("php://input"), true);

$nome = $dados['nome'];
$endereco = $dados['endereco'];
$tipo = $dados['tipo'];
$torcida = $dados['torcida'];
$abertura = $dados['abertura'];
$fechamento = $dados['fechamento'];

$sql = "INSERT INTO locais (nome, tipo, endereco, latitude, longitude, torcida_predominante, horario_abertura, horario_fechamento, aprovado)
        VALUES ('$nome', '$tipo', '$endereco', 0, 0, '$torcida', '$abertura', '$fechamento', TRUE)";

if ($conn->query($sql)) {
    echo json_encode(["sucesso" => true]);
} else {
    echo json_encode(["sucesso" => false, "erro" => $conn->error]);
}

$conn->close();
?>