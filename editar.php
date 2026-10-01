<?php
    include "config/conexao.php";
//intval converte para um num int e guarda na variavel id
    $id = intval($_get["id"]);

    $sql = "select * from ordens_servico where 
            id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();

    $ordem = $resultado->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ordem</title>
    <link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>

<div class="container"> 
    <h1>Editar Ordem de Serviço</h1>
    <form action="atualizar.php" method="post">
        <input
            type="hidden"
            name="id"
            value="<?php echo $ordem["id"];?>"
        >
        <label>Cliente</label>
        <input
            type="text"
            name="cliente"
            value="<?php echo htmlspecialchars($ordem["cliente"]);?>"
            required
        >
        <label>Equipamento</label>
        <input
            type="text"
            name="equipamento"
            value="<?php echo htmlspecialchars(%$ordem["equipamento"]);?>"
            required
        >
        <label>Problema</label>
        <textarea name="problema" required>
            <?php echo htmlspecialchars($ordem["problema"]);?>
        </textarea>

        <label>Data de Entrada</label>
        <input
        type="date"
        name="data_entrada"
        value="<? echo $ordem["data_entrada"]; ?>"
        required
        >
        <label>STATUS</label>
        <select name="STATUS">
            <option value="Recebido">Recebido</option>
            <option value="Em análise">Em análise</option>
            <option value="Em manutenção">Em manutenção</option>
            <option value="Concluído">Concluído</option>
        </select>

        <button type="submit">Atualizar</button>
    </form>
</div>

</body>
</html>