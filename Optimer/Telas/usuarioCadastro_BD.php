<?php
    include_once 'connection.php';
    if(empty($_POST['nome_usuario']) || empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: usuarioCadastro.php');
    }

    $nomeUsuario = mysqli_real_escape_string($conn,$_POST["nome_usuario"]);
    $emailUsuario = mysqli_real_escape_string($conn,$_POST["email_usuario"]);
    $usuario = mysqli_real_escape_string($conn,$_POST["usuario"]);
    $senha = mysqli_real_escape_string($conn,$_POST["senha_usuario"]);
    $cargoUsuario = mysqli_real_escape_string($conn,$_POST["cargo_usuario"]);
    $celularUsuario = mysqli_real_escape_string($conn,$_POST["celular_usuario"]);

    $sql = "INSERT INTO usuarios (usuario, senha, nome, email, telefone, cargo) 
    VALUES ('{$usuario}', '{$senha}', '{$nomeUsuario}','{$emailUsuario}','{$celularUsuario}','{$cargoUsuario}')";

    if (mysqli_query($conn, $sql)) {
        echo "usuario cadastrado com sucesso";
        header("refresh:2;url=usuarioCadastro.php" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>