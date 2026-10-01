<?php
    include "config/conexao.php";

    $id = intval($_POST["id"]);
    $cliente = $_POST["cliente"];
    $equipamento = $_POST["equipamento"];
    $problema = $_POST["problema"];
    $data_entrada = $_POST["data_entrada"];
    $STATUS = $_POST["STATUS"] ;

    $sql = "UPDATE ordens_servico
        SET cliente = ?,
            equipamento = ?,
            problema = ?,
            data_entrada = ?,
            STATUS = ?
        where id = ?";

    $stmt = $conexao -> prepare($sql);
    $stmt -> bind_param(
        "sssssi",
        $cliente,
        $equipamento,
        $problema,
        $data_entrada,
        $STATUS,
        $id
    );

    if ($stmt->execute()){
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao Atualizar!";
    }
    
?>