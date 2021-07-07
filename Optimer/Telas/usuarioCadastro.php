<?php
session_start();
if (!$_SESSION['logged']) {
  header('Location: login.php');
} else {
  if ($_SESSION['cargo'] != 'A') {
    header('Location: index.php');
  }
}
?>
<!Doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Cadastro Funcionario</title>
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
        <h3 class="text-center text-info">CADASTRO DE FUNCIONÁRIO</h3>
        <form id="usuarioCadastro-form" class="form" action="usuarioCadastro_BD.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="nome_usuario">Nome</label>
              <input type="text" class="form-control" id="nome_usuario" name="nome_usuario">
            </div>
            <div class="form-group col-md-12">
              <label for="email_usuario">Email</label>
              <input type="email" class="form-control" id="email_usuario" name="email_usuario">
            </div>
            <div class="form-group col-md-12">
              <label for="celular_usuario">Celular</label>
              <input type="text" class="form-control" id="celular_usuario" name="celular_usuario" placeholder="(DDD) 99999-9999">
            </div>
            <div class="form-group col-md-12">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" name="usuario" id="usuario">
            </div>
            <div class="form-group col-md-6">
              <label for="senha_usuario">senha</label>
              <input type="password" class="form-control" name="senha_usuario" id="senha_usuario">
            </div>
            <div class="form-group col-md-6">
              <label for="senha_usuario_confirm">Confirmar Senha</label>
              <input type="password" class="form-control" name="senha_usuario_comfirm" id="senha_usuario_comfirm">
            </div>
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cargo_usuario" id="corretor_usuario" value="F">
                <label class="form-check-label" for="corretor_usuario">Corretor</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cargo_usuario" id="gerente_usuario" value="A">
                <label class="form-check-label" for="gerente_usuario">Gerente</label>
              </div>
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