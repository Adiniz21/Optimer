<?php
session_start();
if (!$_SESSION['logged']) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Veiculo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="optimerjs.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(readyFn);
    </script>
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
                <h3 class="text-center text-info">VEICULOS CADASTRADOS</h3>
                <tr>
                    <span id="conteudo"></span>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>