<?php
require_once '../dao/DestinoDAO.php';
$dao = new DestinoDAO();
$destinos = $dao->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Destinos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Destinos Cadastrados</h2>
        <a href="form_destino.php" class="btn btn-primary">Novo Destino</a>
    </div>

    <table class="table table-striped shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Local</th>
                <th>Valor da Passagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if($destinos): foreach($destinos as $d): ?>
            <tr>
                <td><?= $d['id_destino'] ?></td>
                <td><?= $d['nome_local'] ?></td>
                <td>R$ <?= number_format($d['valor_passagem'], 2, ',', '.') ?></td>
                <td>
                    <a href="form_destino.php?id=<?= $d['id_destino'] ?>" class="btn btn-primary btn-sm">Editar</a>
                    
                    <a href="../controller/DestinoController.php?acao=excluir&id=<?= $d['id_destino'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este destino?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="4" class="text-center">Nenhum destino encontrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Voltar ao Menu</a>
</body>
</html>