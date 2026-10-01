<?php
    include "config/conexao.php";
    //post é uma variável especial do PHP, recebe dados enviados elos formulario quando usamos o method="post" do HTML.
    $cliente = $_POST["cliente"];
    $equipamento = $_POST["equipamento"];
    $problema = $_POST["problema"];
    $data_entrada = $_POST["data_entrada"];
    $STATUS = $_POST["STATUS"];

    $sql = "insert into ordens_servico
        (cliente, equipamento, problema, data_entrada, STATUS)
        values (?, ?, ?, ?, ?)";
        //? = espaços reservados


    //statement é uma declaração
    $stmt = $conexao->prepare($sql);

    //parametro string 
    $stmt->bind_param(
        "sssss",
        $cliente,
        $equipamento,
        $problema,
        $data_entrada,
        $STATUS
    );

    if ($stmt->execute()){
        header("Location: index.php");
        exit;
    } else{
        echo "Erro ao cadastrar ordem de serviço.";
    }


?>