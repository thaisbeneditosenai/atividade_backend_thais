<?php
    include "config/conexao.php";

    $id = intval($_post["id"]);
    $cliente = $_post["cliente"];
    $equipamento = $_post["equipamento"];
    $problema = $_post["problema"];
    $data_entrada = $_post["data_entrada"];
    $STATUS = $_post["STATUS"];

    $sql = "UPDATE ordens_servico
        set cliente = ?
            equipamento = ?
            problema = ?
            data_entrada = ?
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