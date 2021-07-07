<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <img src="Logo.png" width="350px" height="350px" class="rounded mx-auto d-block img-fluid" style="margin-bottom: 1cm; margin-top: 1cm;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div id="form-box" class="col-md-8">
                <h3 class="text-center text-info">LOGIN</h3>
                <form id="login-form" class="form" action="validarLogin.php" method="post">
                    <div class="form-group">
                        <label for="username" class="text-info">USUARIO:</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">SENHA: </label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <?php
                    if (isset($_SESSION['nao_atenticado'])) :
                    ?>
                        <div class="alert alert-danger text-center col-md-12" role="alert">
                            Usuário ou senha incorretos
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_atenticado']);
                    ?>
                    <input type="submit" class="btn btn-info btn-md">


                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>

</html>