<?php
    include_once 'connection.php';
    if(empty($_POST['nome_cliente']) || empty($_POST['celular_cliente']) || empty($_POST['cpf_cliente'])){
        header('Location: clienteCadastro.php');
    }

    $nome = mysqli_real_escape_string($conn,$_POST["nome_cliente"]);
    $email = mysqli_real_escape_string($conn,$_POST["email_cliente"]);
    $celular = mysqli_real_escape_string($conn,$_POST["celular_cliente"]);
    $inscest = mysqli_real_escape_string($conn,$_POST["inscEst_cliente"]);
    $identidade = mysqli_real_escape_string($conn,$_POST["identidade_cliente"]);
    $cpf = mysqli_real_escape_string($conn,$_POST["cpf_cliente"]);
    $rua = mysqli_real_escape_string($conn,$_POST["rua_cliente"]);
    $numero = mysqli_real_escape_string($conn,$_POST["numero_cliente"]);
    $bairro = mysqli_real_escape_string($conn,$_POST["bairro_cliente"]);
    $cidade = mysqli_real_escape_string($conn,$_POST["cidade_cliente"]);
    $estado = mysqli_real_escape_string($conn,$_POST["estado_cliente"]);
    $cep = mysqli_real_escape_string($conn,$_POST["cep_cliente"]);
    $dataNasc = mysqli_real_escape_string($conn,$_POST["nascimento_cliente"]);
    $genero = mysqli_real_escape_string($conn,$_POST["genero_cliente"]);
    $obs = mysqli_real_escape_string($conn,$_POST["observacoes_cliente"]);
    $dataAutual = date('Y-m-d');

    $sql = "INSERT INTO clientes (identidade, cpfcnpj, nome, email, inscEst, telefone, genero, data_nasc, data_cadastro, observacoes) 
    VALUES ('{$identidade}','{$cpf}','{$nome}','{$email}','{$inscest}','{$celular}','{$genero}','{$dataNasc}','{$dataAutual}','{$obs}')";

    if (mysqli_query($conn, $sql)) {
        

        $sql = "SELECT id_cliente FROM clientes WHERE cpfcnpj = '{$cpf}'";
        $result = mysqli_query($conn, $sql);
        $array = mysqli_fetch_assoc($result);
        $idResidente = $array['id_cliente'];
        $sql = "INSERT INTO enderecos (id_residente, logradouro, numero, bairro, cidade, cep, estado) 
        VALUES ('{$idResidente}' , '{$rua}', '{$numero}', '{$bairro}','{$cidade}','{$cep}','{$estado}')";
        if (mysqli_query($conn, $sql)) {
            echo "cliente cadastrado com sucesso";
            header("refresh:2;url=clienteCadastro.php" );
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
   
?>