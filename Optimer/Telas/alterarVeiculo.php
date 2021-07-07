<!Doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Alterar Veículo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

include_once "connection.php";

$id_veiculo = $_GET["id_veiculo"];
$id_operacao = $_GET["id_operacao"];

if ($id_operacao == 2) {

    $sql = "DELETE FROM veiculos WHERE id_veiculo={$id_veiculo}";

    if ($conn->query($sql) === TRUE) {
        ?>
            <script>window.opener.location.href="veiculoGerenciar.php";
            self.close();</script>
        <?php

    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


if ($id_operacao == 1) {
    $sql_veiculo_alterar = "SELECT * FROM `veiculos`,`status` WHERE veiculos.id_veiculo = {$id_veiculo} AND veiculos.id_status = status.id_status";
    $resultado_veiculo_alterar = mysqli_query($conn, $sql_veiculo_alterar);
    $row_veiculo_alterar = mysqli_fetch_assoc($resultado_veiculo_alterar);
?>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div id="form-box" class="col-md-12" style="margin-top: 5%;">
        <h3 class="text-center text-info">ALTERAR VEÍCULO</h3>
        <form id="veiculoAlterar-form" class="form" action="veiculoAlterar_BD.php" method="post">
          <div class="form-row">
            <input type="hidden" class="form-control" value="<?php echo $id_veiculo ?>" id="id_veiculo_alterar" name="id_veiculo_alterar">
            <div class="form-group col-md-4">
              <label for="modelo_veiculo_alterar">Modelo</label>
              <input type="text" class="form-control" value="<?php echo $row_veiculo_alterar["modelo"] ?>" id="modelo_veiculo_alterar" name="modelo_veiculo_alterar">
            </div>
            <div class="form-group col-md-4">
              <label for="ano_veiculo_alterar">Ano</label>
              <input type="number" class="form-control" value="<?php echo $row_veiculo_alterar["ano"] ?>" id="ano_veiculo_alterar" name="ano_veiculo_alterar">
            </div>
            <div class="form-group col-md-4">
              <label for="cor_veiculo_alterar">Cor</label>
              <input type="text" class="form-control" value="<?php echo $row_veiculo_alterar["cor"] ?>" name="cor_veiculo_alterar" id="cor_veiculo_alterar">
            </div>
            <div class="form-group col-md-3">
              <label for="placa_veiculo_alterar">Placa</label>
              <input type="text" class="form-control" value="<?php echo $row_veiculo_alterar["placa"] ?>" name="placa_veiculo_alterar" id="placa_veiculo_alterar">
            </div>
            <div class="form-group col-md-6">
              <label for="chassi_veiculo_alterar">Chassi</label>
              <input type="text" class="form-control" value="<?php echo $row_veiculo_alterar["chassi"] ?>" name="chassi_veiculo_alterar" id="chassi_veiculo_alterar">
            </div>
            <div class="form-group col-md-3">
              <label for="dataAquisicao_veiculo_alterar">Data Aquisição</label>
              <input type="date" class="form-control" value="<?php echo $row_veiculo_alterar["dataAquisicao"] ?>" name="dataAquisicao_veiculo_alterar" id="dataAquisicao_veiculo_alterar">
            </div>
            <div class="form-group col-md-4">
              <label for="capacidadeTanque_veiculo_alterar">Capacidade do Tanque/Litros</label>
              <input type="number" class="form-control" value="<?php echo $row_veiculo_alterar["capacidadeTanque"] ?>" name="capacidadeTanque_veiculo_alterar" id="capacidadeTanque_veiculo_alterar">
            </div>
            <div class="form-group col-md-4">
              <label for="quilometragemAquisicao_veiculo_alterar">Quilometragem Aquisição</label>
              <input type="number" class="form-control" value="<?php echo $row_veiculo_alterar["quilometragemAquisicao"] ?>" name="quilometragemAquisicao_veiculo_alterar" id="quilometragemAquisicao_veiculo_alterar">
            </div>
            <div class="form-group col-md-4">
              <label for="quilometragemAtual_veiculo_alterar">Quilometragem Atual</label>
              <input type="number" class="form-control" value="<?php echo $row_veiculo_alterar["quilometragemAtual"] ?>" name="quilometragemAtual_veiculo_alterar" id="quilometragemAtual_veiculo_alterar">
            </div>
            <div class="form-group col-md-12">
              <label for="observacoes_veiculo_alterar">Observações</label>
              <input class="form-control" value="<?php echo $row_veiculo_alterar["observacoes"]?>" name="observacoes_veiculo_alterar" id="observacoes_veiculo_alterar">
            </div>

          </div>
          <button type="submit" class="btn btn-primary btn-block">Atualizar dados</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

<?php
}
?>
