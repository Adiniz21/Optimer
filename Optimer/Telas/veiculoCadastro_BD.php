<?php
include_once 'connection.php';
if (empty($_POST['modelo_veiculo']) || empty($_POST['placa_veiculo']) || empty($_POST['chassi_veiculo'])) {
    header('Location: veiculoCadastro.php');
}

$modelo = mysqli_real_escape_string($conn, $_POST["modelo_veiculo"]);
$ano = mysqli_real_escape_string($conn, $_POST["ano_veiculo"]);
$cor = mysqli_real_escape_string($conn, $_POST["cor_veiculo"]);
$placa = mysqli_real_escape_string($conn, $_POST["placa_veiculo"]);
$chassi = mysqli_real_escape_string($conn, $_POST["chassi_veiculo"]);
$dataaquisicao = mysqli_real_escape_string($conn, $_POST["dataAquisicao_veiculo"]);
$capacidadetanque = mysqli_real_escape_string($conn, $_POST["capacidadeTanque_veiculo"]);
$quilometragemaquisicao = mysqli_real_escape_string($conn, $_POST["quilometragemAquisicao_veiculo"]);
$quilometragematual = mysqli_real_escape_string($conn, $_POST["quilometragemAtual_veiculo"]);
$observacoes = mysqli_real_escape_string($conn, $_POST["observacoes_veiculo"]);

$sql = "INSERT INTO veiculos (modelo, ano, cor, placa, chassi, dataAquisicao, capacidadeTanque, quilometragemAquisicao, quilometragemAtual, observacoes) 
    VALUES ('{$modelo}', '{$ano}', '{$cor}','{$placa}', '{$chassi}','{$dataaquisicao}',{$capacidadetanque}, {$quilometragemaquisicao}, {$quilometragematual}, '{$observacoes}')";

if (mysqli_query($conn, $sql)) {
    echo "veiculo cadastrado com sucesso";
        header("refresh:2;url=veiculoCadastro.php" );
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>