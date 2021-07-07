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
  <title>Cadastro Cliente</title>
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Veículos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="veiculoCadastro.php">Cadastro</a>
              <a class="dropdown-item" href="veiculoGerenciar.php">Manutenção/Gerenciar</a>
            </div>
          <li class="nav-item dropdown active">
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
        <h3 class="text-center text-info">CADASTRO DE CLIENTE</h3>
        <form id="cadastroCliente-form" class="form" action="clienteCadastro_BD.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nome_cliente">Nome Completo</label>
              <input type="text" class="form-control" id="nome_cliente" name="nome_cliente">
            </div>
            <div class="form-group col-md-4">
              <label for="email_cliente">Email</label>
              <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
              <label for="celular_cliente">Celular</label>
              <input type="text" class="form-control" name="celular_cliente" id="celular_cliente" placeholder="(DDD) 99999-9999">
            </div>
            <div class="form-group col-md-4">
              <label for="inscEst_cliente">Inscrição Estadual</label>
              <input type="number" class="form-control" name="inscEst_cliente" id="inscEst_cliente">
            </div>
            <div class="form-group col-md-4">
              <label for="identidade_cliente">Identidade</label>
              <input type="text" class="form-control" name="identidade_cliente" id="identidade_cliente">
            </div>
            <div class="form-group col-md-4">
              <label for="cpf_cliente">CPF</label>
              <input type="text" class="form-control" name="cpf_cliente" id="cpf_cliente" placeholder="999.999.999-76">
            </div>
            <div class="form-group col-md-6">
              <label for="rua_cliente">Logradouro</label>
              <input type="text" class="form-control" id="rua_cliente" name="rua_cliente" placeholder="Rua 1234, Bairro">
            </div>
            <div class="form-group col-md-2">
              <label for="numero_cliente">Numero</label>
              <input type="text" class="form-control" id="numero_cliente" name="numero_cliente" placeholder="Rua 1234, Bairro">
            </div>
            <div class="form-group col-md-4">
              <label for="bairro_cliente">Bairro</label>
              <input type="text" class="form-control" id="bairro_cliente" name="bairro_cliente" placeholder="Rua 1234, Bairro">
            </div>
            <div class="form-group col-md-4">
              <label for="cidade_cliente">Cidade</label>
              <input type="text" class="form-control" id="cidade_cliente" name="cidade_cliente" placeholder="Cidade">
            </div>
            <div class="form-group col-md-4">
              <label for="estado_cliente">Estado</label>
              <select id="estado_cliente" name="estado_cliente" class="form-control">
                <option selected>Escolha</option>
                <option>Acre</option>
                <option>Alagoas</option>
                <option>Amapá</option>
                <option>Amazonas</option>
                <option>Bahia</option>
                <option>Ceará</option>
                <option>Distrito Federeal</option>
                <option>Espirito Santo</option>
                <option>Goiás</option>
                <option>Maranhão</option>
                <option>Mato Grosso</option>
                <option>Mato Grosso do Sul</option>
                <option>Minas Gerais</option>
                <option>Pará</option>
                <option>Pernambuco</option>
                <option>Piauí</option>
                <option>Rio de Janeiro</option>
                <option>Rio Grande do Norte</option>
                <option>Rio Grande do Sul</option>
                <option>Rondônia</option>
                <option>Roraima</option>
                <option>Santa Catarina</option>
                <option>São Paulo</option>
                <option>Sergipe</option>
                <option>Tocantins</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="cep_cliente">CEP</label>
              <input type="text" class="form-control" id="cep_cliente" name="cep_cliente" placeholder="xxxxx-xxx">
            </div>
            <div class="form-group col-md-2">
              <label for="nascimento_cliente">Data Nascimento</label>
              <input type="date" class="form-control" id="nascimento_cliente" name="nascimento_cliente" placeholder="xxxxx-xxx">
            </div>
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero_cliente" id="generoM_cliente" value="M">
                <label class="form-check-label" for="generoM_cliente">Masculino</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero_cliente" id="generoF_cliente" value="A">
                <label class="form-check-label" for="generoF_cliente">Feminino</label>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label for="observacoes_cliente">Observações</label>
              <textarea class="form-control" name="observacoes_cliente" id="observacoes_cliente" rows="3"></textarea>
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