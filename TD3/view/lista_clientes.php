<?php
require_once '../dao/ClienteDAO.php';
$dao = new ClienteDAO();
$clientes = $dao->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Clientes Cadastrados</h2>
        <a href="form_cliente.php" class="btn btn-success">Novo Cliente</a>
    </div>

    <table class="table table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if($clientes): foreach($clientes as $c): ?>
            <tr>
                <td><?= $c['id_cliente'] ?></td>
                <td><?= $c['nome'] ?></td>
                <td><?= $c['cpf'] ?></td>
                <td><?= $c['email'] ?></td>
                <td>
                    <a href="form_cliente.php?id=<?= $c['id_cliente'] ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="../controller/ClienteController.php?acao=excluir&id=<?= $c['id_cliente'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="5" class="text-center">Nenhum cliente cadastrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Voltar ao Menu</a>
</body>
</html>