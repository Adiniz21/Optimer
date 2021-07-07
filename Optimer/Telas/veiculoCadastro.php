<?php
session_start();
if (!$_SESSION['logged']) {
  header('Location: login.php');
}
?>
<!Doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Cadastro Veículo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="conteiner">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><img src="logo1.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Optimer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Alugueis
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="aluguelNovo.php">Novo Aluguel</a>
              <a class="dropdown-item" href="#">Exibir/Gerenciar</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Veículos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="veiculoCadastro.php">Cadastro</a>
              <a class="dropdown-item" href="veiculoGerenciar.php">Manutenção/Gerenciar</a>
            </div>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Clientes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="clienteCadastro.php">Cadastro</a>
              <a class="dropdown-item" href="#">Gerenciar</a>
            </div>
          </li>
          </li>
          <?php if ($_SESSION['cargo'] == 'A') : ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Relatórios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="usuarioCadastro.php">Funcionários</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="navbar-collapse collapse w-90 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link"><?php echo $_SESSION['nome'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="deslogar.php">sair</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div id="form-box" class="col-md-12" style="margin-top: 5%;">
        <h3 class="text-center text-info">CADASTRO DE VEÍCULOS</h3>
        <form id="veiculoCadastro-form" class="form" action="veiculoCadastro_BD.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="modelo_veiculo">Modelo</label>
              <input type="text" class="form-control" id="modelo_veiculo" name="modelo_veiculo">
            </div>
            <div class="form-group col-md-4">
              <label for="ano_veiculo">Ano</label>
              <input type="number" class="form-control" id="ano_veiculo" name="ano_veiculo">
            </div>
            <div class="form-group col-md-4">
              <label for="cor_veiculo">Cor</label>
              <input type="text" class="form-control" name="cor_veiculo" id="cor_veiculo">
            </div>
            <div class="form-group col-md-3">
              <label for="placa_veiculo">Placa</label>
              <input type="text" class="form-control" name="placa_veiculo" id="placa_veiculo">
            </div>
            <div class="form-group col-md-7">
              <label for="chassi_veiculo">Chassi</label>
              <input type="text" class="form-control" name="chassi_veiculo" id="chassi_veiculo">
            </div>
            <div class="form-group col-md-2">
              <label for="dataAquisicao_veiculo">Data Aquisição</label>
              <input type="date" class="form-control" name="dataAquisicao_veiculo" id="dataAquisicao_veiculo">
            </div>
            <div class="form-group col-md-4">
              <label for="capacidadeTanque_veiculo">Capacidade do Tanque/Litros</label>
              <input type="number" class="form-control" name="capacidadeTanque_veiculo" id="capacidadeTanque_veiculo">
            </div>
            <div class="form-group col-md-4">
              <label for="quilometragemAquisicao_veiculo">Quilometragem Aquisição</label>
              <input type="number" class="form-control" name="quilometragemAquisicao_veiculo" id="quilometragemAquisicao_veiculo">
            </div>
            <div class="form-group col-md-4">
              <label for="quilometragemAtual_veiculo">Quilometragem Atual</label>
              <input type="number" class="form-control" name="quilometragemAtual_veiculo" id="quilometragemAtual_veiculo">
            </div>
            <div class="form-group col-md-12">
              <label for="observacoes_veiculo">Observações</label>
              <textarea class="form-control" name="observacoes_veiculo" id="observacoes_veiculo" rows="3"></textarea>
            </div>

          </div>
          <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>