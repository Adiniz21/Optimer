<?php

include_once 'connection.php';

if (empty($_POST['modelo_veiculo_alterar']) || empty($_POST['placa_veiculo_alterar']) || empty($_POST['chassi_veiculo_alterar'])) {
?>
    <script>
        alert("Sem informações suficientes")
        self.close();
    </script>
<?php

}

$id_veiculo = mysqli_real_escape_string($conn, $_POST["id_veiculo_alterar"]);
$modelo = mysqli_real_escape_string($conn, $_POST["modelo_veiculo_alterar"]);
$ano = mysqli_real_escape_string($conn, $_POST["ano_veiculo_alterar"]);
$cor = mysqli_real_escape_string($conn, $_POST["cor_veiculo_alterar"]);
$placa = mysqli_real_escape_string($conn, $_POST["placa_veiculo_alterar"]);
$chassi = mysqli_real_escape_string($conn, $_POST["chassi_veiculo_alterar"]);
$dataaquisicao = mysqli_real_escape_string($conn, $_POST["dataAquisicao_veiculo_alterar"]);
$capacidadetanque = mysqli_real_escape_string($conn, $_POST["capacidadeTanque_veiculo_alterar"]);
$quilometragemaquisicao = mysqli_real_escape_string($conn, $_POST["quilometragemAquisicao_veiculo_alterar"]);
$quilometragematual = mysqli_real_escape_string($conn, $_POST["quilometragemAtual_veiculo_alterar"]);
$observacoes = mysqli_real_escape_string($conn, $_POST["observacoes_veiculo_alterar"]);

$sql = "UPDATE veiculos SET modelo='{$modelo}', ano='{$ano}', cor='{$cor}',placa='{$placa}', chassi='{$chassi}',dataAquisicao='{$dataaquisicao}',capacidadeTanque={$capacidadetanque}, quilometragemAquisicao={$quilometragemaquisicao}, quilometragemAtual={$quilometragematual}, observacoes='{$observacoes}' WHERE id_veiculo={$id_veiculo} ";

if (mysqli_query($conn, $sql)) {
?>
    <script>
        window.opener.location.href = "veiculoGerenciar.php";
        self.close();
    </script>
<?php
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


?>