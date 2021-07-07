<?php
    include_once 'connection.php';
    if(empty($_POST['username']) || empty($_POST['password'])){
        header('Location: login.php');
    }

    $usuario = mysqli_real_escape_string($conn,$_POST["username"]);
    $senha = mysqli_real_escape_string($conn,$_POST["password"]);

    $sql = "SELECT id_usuario,usuario,nome,cargo FROM usuarios WHERE usuario = '{$usuario}' AND senha = '{$senha}'";
    $result = mysqli_query($conn, $sql);
    $array = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);

    session_start();
    $_SESSION['logged'] = $_SESSION['logged'] ?? False;

    if($row == 1){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        $_SESSION['nome'] = $array['nome'];
        $_SESSION['cargo'] = $array['cargo'];
        $_SESSION['logged'] = true;
        header('Location: index.php');
    }else{ 
        $_SESSION['logged'] = false;
        $_SESSION['nao_atenticado'] = true;
        header('Location: login.php');
    }
    mysqli_free_result($result);
