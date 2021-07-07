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
  <title>Novo Aluguel</title>
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
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Alugueis
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="aluguelNovo.php">Novo Aluguel</a>
              <a class="dropdown-item" href="#">Exibir/Gerenciar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Veículos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="veiculoCadastro.php">Cadastro</a>
              <a class="dropdown-item" href="veiculoGerenciar.php">Manutenção/Gerenciar</a>
            </div>
          <li class="nav-item dropdown">
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
        <h3 class="text-center text-info">NOVO ALUGUEL</h3>
        <input type="search" class="form-control col-md-3" id="agenda_aluguel" name="agenda_aluguel" placeholder="Carregar Agendamento" style="margin-bottom: 1em">
        <form id="novoAluguel-form" class="form" action="" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cliente_aluguel">Cliente</label>
              <input type="search" class="form-control" id="cliente_aluguel" name="cliente_aluguel">
            </div>
            <div class="form-group col-md-6">
              <label for="veiculo_aluguel">Veículo</label>
              <input type="search" class="form-control" id="veiculo_aluguel" name="veiculo_aluguel">
            </div>
            <div class="form-group col-md-3">
              <label for="cpfcnpj_aluguel">CPF/CNPJ</label>
              <input type="text" class="form-control" name="cpfcnpj_aluguel" id="cpfcnpj_aluguel">
            </div>
            <div class="form-group col-md-3">
              <label for="cnh_aluguel">CNH Motorista</label>
              <input type="number" class="form-control" name="cnh_aluguel" id="cnh_aluguel">
            </div>
            <div class="form-group col-md-3">
              <label for="placa_aluguel">Placa</label>
              <input type="text" class="form-control" name="placa_aluguel" id="placa_aluguel">
            </div>
            <div class="form-group col-md-3">
              <label for="status_aluguel">Status</label>
              <input type="text" class="form-control" id="status_aluguel" name="status_aluguel">
            </div>
            <div class="form-group col-md-4">
              <label for="endereco_aluguel">Endereco</label>
              <input type="text" class="form-control" id="endereco_aluguel" name="endereco_aluguel">
            </div>
            <div class="form-group col-md-2">
              <label for="cep_aluguel">CEP</label>
              <input type="text" class="form-control" id="cep_aluguel" name="cep_aluguel">
            </div>
            <div class="form-group col-md-3">
              <label for="dataSaida_aluguel">Data Saida</label>
              <input type="date" class="form-control" id="dataSaida_aluguel" name="dataSaida_aluguel">
            </div>
            <div class="form-group col-md-3">
              <label for="dataRetorno_aluguel">Data Retorno</label>
              <input type="date" class="form-control" id="dataRetorno_aluguel" name="dataRetorno_aluguel">
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-block">Prosseguir CheckList</button>
        </form>
        <form id="checkListAluguel-form" class="form" action="" method="post" style="margin-top: 1em;">
          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="checkListAluguel_documentos">Documentos</label>
              <select id="checkListAluguel_documentos" name="checkListAluguel_documentos" class="form-control">
                <option selected>Em dia</option>
                <option>Vencido</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_documentosObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_documentosObs" name="checkListAluguel_documentosObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_somcdradio">Som CD Rádio</label>
              <select id="checkListAluguel_somcdradio" name="checkListAluguel_somcdradio" class="form-control">
                <option selected>Novos</option>
                <option>Bons</option>
                <option>Ruins</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_somcdradioObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_somcdradioObs" name="checkListAluguel_somcdradioObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_pneus">Pneus</label>
              <select id="checkListAluguel_pneus" name="checkListAluguel_pneus" class="form-control">
                <option selected>Novos</option>
                <option>Bons</option>
                <option>Ruins</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_pneusObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_pneusObs" name="checkListAluguel_pneusObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_setas">Setas</label>
              <select id="checkListAluguel_setas" name="checkListAluguel_setas" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_setasObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_setasObs" name="checkListAluguel_setasObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_pneuStep">Pneu Step</label>
              <select id="checkListAluguel_pneuStep" name="checkListAluguel_pneuStep" class="form-control">
                <option selected>Novos</option>
                <option>Bons</option>
                <option>Ruins</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_pneuStepObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_pneuStepObs" name="checkListAluguel_pneuStepObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_funcBancos">Funcionamento Bancos</label>
              <select id="checkListAluguel_funcBancos" name="checkListAluguel_funcBancos" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_funcBancosObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_funcBancosObs" name="checkListAluguel_funcBancosObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_calotas">Calotas</label>
              <select id="checkListAluguel_calotas" name="checkListAluguel_calotas" class="form-control">
                <option selected>Novas</option>
                <option>Quebrada</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_calotasObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_calotasObs" name="checkListAluguel_calotasObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_arCondicioando">Ar Condicioando</label>
              <select id="checkListAluguel_arCondicioando" name="checkListAluguel_arCondicioando" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_arCondicioandoObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_arCondicioandoObs" name="checkListAluguel_arCondicioandoObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_macaco">Macaco</label>
              <select id="checkListAluguel_macaco" name="checkListAluguel_macaco" class="form-control">
                <option selected>Novos</option>
                <option>Bom</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_macacoObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_macacoObs" name="checkListAluguel_macacoObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_Buzina">Buzina</label>
              <select id="checkListAluguel_Buzina" name="checkListAluguel_Buzina" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_BuzinaObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_BuzinaObs" name="checkListAluguel_BuzinaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_ChaveDeRoda">Chave De Roda</label>
              <select id="checkListAluguel_ChaveDeRoda" name="checkListAluguel_ChaveDeRoda" class="form-control">
                <option selected>Novas</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_ChaveDeRodaObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_ChaveDeRodaObs" name="checkListAluguel_ChaveDeRodaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_AcionamenEletVidros">Acionamento Eletrico Vidros</label>
              <select id="checkListAluguel_AcionamenEletVidros" name="checkListAluguel_AcionamenEletVidros" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_AcionamenEletVidrosObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_AcionamenEletVidrosObs" name="checkListAluguel_AcionamenEletVidrosObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_triangulo">Triangulo</label>
              <select id="checkListAluguel_triangulo" name="checkListAluguel_triangulo" class="form-control">
                <option selected>Novos</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_trianguloObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_trianguloObs" name="checkListAluguel_trianguloObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_travaEletPortas">Trava Eletrica Portas</label>
              <select id="checkListAluguel_travaEletPortas" name="checkListAluguel_travaEletPortas" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_travaEletPortasObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_travaEletPortasObs" name="checkListAluguel_travaEletPortasObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_extIncendio">Extintor de Incêndio</label>
              <select id="checkListAluguel_extIncendio" name="checkListAluguel_extIncendio" class="form-control">
                <option selected>Novo</option>
                <option>Vencido</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_extIncendioObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_extIncendioObs" name="checkListAluguel_extIncendioObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_estofamento">Estofamento</label>
              <select id="checkListAluguel_estofamento" name="checkListAluguel_estofamento" class="form-control">
                <option selected>Novos</option>
                <option>Bons</option>
                <option>Ruins</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_estofamentoObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_estofamentoObs" name="checkListAluguel_estofamentoObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_tapetes">Tapetes</label>
              <select id="checkListAluguel_tapetes" name="checkListAluguel_tapetes" class="form-control">
                <option selected>Novos</option>
                <option>Bons</option>
                <option>Ruins</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_tapetesObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_tapetesObs" name="checkListAluguel_tapetesObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_cintoSeguranca">Cinto de Segurança</label>
              <select id="checkListAluguel_cintoSeguranca" name="checkListAluguel_cintoSeguranca" class="form-control">
                <option selected>Novos</option>
                <option>Bons</option>
                <option>Ruins</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_cintoSegurancaObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_cintoSegurancaObs" name="checkListAluguel_cintoSegurancaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_chapaProtecao">Chapa de Proteção</label>
              <select id="checkListAluguel_chapaProtecao" name="checkListAluguel_chapaProtecao" class="form-control">
                <option selected>Nova</option>
                <option>Batendo</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_chapaProtecaoObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_chapaProtecaoObs" name="checkListAluguel_chapaProtecaoObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_controlesInternos">Controles Internos</label>
              <select id="checkListAluguel_controlesInternos" name="checkListAluguel_controlesInternos" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_controlesInternosObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_controlesInternosObs" name="checkListAluguel_controlesInternosObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_placas">placas</label>
              <select id="checkListAluguel_placas" name="checkListAluguel_placas" class="form-control">
                <option selected>Selada</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_placasObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_placasObs" name="checkListAluguel_placasObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_instruPainel">Instrumentos do Painel</label>
              <select id="checkListAluguel_instruPainel" name="checkListAluguel_instruPainel" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_instruPainelObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_instruPainelObs" name="checkListAluguel_instruPainelObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_combustivel">Combustivel</label>
              <select id="checkListAluguel_combustivel" name="checkListAluguel_combustivel" class="form-control">
                <option selected>Cheio</option>
                <option>3/4</option>
                <option>Metade</option>
                <option>1/4</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_combustivelObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_combustivelObs" name="checkListAluguel_combustivelObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_luzesInternas">Luzes Internas</label>
              <select id="checkListAluguel_luzesInternas" name="checkListAluguel_luzesInternas" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_luzesInternasObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_luzesInternasObs" name="checkListAluguel_luzesInternasObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_oleoMotor">Óleo Motor</label>
              <select id="checkListAluguel_oleoMotor" name="checkListAluguel_oleoMotor" class="form-control">
                <option selected>Cheio</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_oleoMotorObs">Nível</label>
              <input type="text" class="form-control" id="checkListAluguel_oleoMotorObs" name="checkListAluguel_oleoMotorObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_luzFreio">Luz de Freio</label>
              <select id="checkListAluguel_luzFreio" name="checkListAluguel_luzFreio" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_luzFreioObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_luzFreioObs" name="checkListAluguel_luzFreioObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_luzRe">Luz Ré</label>
              <select id="checkListAluguel_luzRe" name="checkListAluguel_luzRe" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_luzReObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_luzReObs" name="checkListAluguel_luzReObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_kitSOS">Kit de Primeiro Socorros</label>
              <select id="checkListAluguel_kitSOS" name="checkListAluguel_kitSOS" class="form-control">
                <option selected>Completo</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_kitSOSObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_kitSOSObs" name="checkListAluguel_kitSOSObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_limpVidroTras">Limpador Vidro Traseiro</label>
              <select id="checkListAluguel_limpVidroTras" name="checkListAluguel_limpVidroTras" class="form-control">
                <option selected>Bons</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_limpVidroTrasObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_limpVidroTrasObs" name="checkListAluguel_limpVidroTrasObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_aguaParaBrisa">Água Para-Brisa</label>
              <select id="checkListAluguel_aguaParaBrisa" name="checkListAluguel_aguaParaBrisa" class="form-control">
                <option selected>Cheio</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_aguaParaBrisaObs">Nível/Obs</label>
              <input type="text" class="form-control" id="checkListAluguel_aguaParaBrisaObs" name="checkListAluguel_aguaParaBrisaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_limpParaBrisa">Limpador Para Brisa</label>
              <select id="checkListAluguel_limpParaBrisa" name="checkListAluguel_limpParaBrisa" class="form-control">
                <option selected>Bons</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_limpParaBrisaObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_limpParaBrisaObs" name="checkListAluguel_limpParaBrisaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_parteEletrica">Parte Eletrica</label>
              <select id="checkListAluguel_parteEletrica" name="checkListAluguel_parteEletrica" class="form-control">
                <option selected>Funcionando</option>
                <option>Com Defeito</option>
                <option>Falta</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_parteEletricaObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_parteEletricaObs" name="checkListAluguel_parteEletricaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_limpeza">Limpeza</label>
              <select id="checkListAluguel_limpeza" name="checkListAluguel_limpeza" class="form-control">
                <option selected>Limpo</option>
                <option>Sujo Interno</option>
                <option>Sujo Externo</option>
                <option>Sujo</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_limpezaObs">Observação</label>
              <input type="text" class="form-control" id="checkListAluguel_limpezaObs" name="checkListAluguel_limpezaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_arranhoes">Arranhões</label>
              <select id="checkListAluguel_arranhoes" name="checkListAluguel_arranhoes" class="form-control">
                <option selected>Não</option>
                <option>Sim</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_arranhoesObs">Descrição</label>
              <input type="text" class="form-control" id="checkListAluguel_arranhoesObs" name="checkListAluguel_arranhoesObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_pintura">Pintura</label>
              <select id="checkListAluguel_pintura" name="checkListAluguel_pintura" class="form-control">
                <option selected>Nova</option>
                <option>Desgastada</option>
                <option>Danificada</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_pinturaObs">Descrição</label>
              <input type="text" class="form-control" id="checkListAluguel_pinturaObs" name="checkListAluguel_pinturaObs">
            </div>

            <div class="form-group col-md-3">
              <label for="checkListAluguel_amassados">Amassados</label>
              <select id="checkListAluguel_amassados" name="checkListAluguel_amassados" class="form-control">
                <option selected>Sim</option>
                <option>Não</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label for="checkListAluguel_amassadosObs">Descrição</label>
              <input type="text" class="form-control" id="checkListAluguel_amassadosObs" name="checkListAluguel_amassadosObs">
            </div>

          </div>
          <button type="button" class="btn btn-primary btn-block">Gerar Documento Para coleta De Assinatura</button>
        </form>

        <form id="checkListAluguel-form" class="form" action="" method="post" style="margin-top: 1em;">
          <div class="form-group row">
            <div class="form-group col-md-3">
              <label for="aluguelAssinatura">Assinatura Coletada?</label>
              <select id="aluguelAssinatura" name="aluguelAssinatura" class="form-control">
                <option selected>Não</option>
                <option>Sim</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="horaSaida">Hora de Saida</label>
              <input type="text" class="form-control" id="horaSaida" name="horaSaida_Aluguel">
            </div>
          </div>
          <button type="button" class="btn btn-success btn-block">Confirmar Aluguel</button>
        </form>

      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>