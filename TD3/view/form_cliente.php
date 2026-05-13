<?php
require_once '../dao/ClienteDAO.php';
$id_cliente = $_GET['id'] ?? null;
$cliente = $id_cliente ? (new ClienteDAO())->buscarPorId($id_cliente) : null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow" style="max-width: 500px;">
            <div class="card-header <?= $cliente ? 'bg-warning' : 'bg-success' ?> text-white">
                <h3><?= $cliente ? 'Editar Cliente' : 'Novo Cliente' ?></h3>
            </div>
            <div class="card-body">
                <form action="../controller/ClienteController.php" method="POST">
                    <input type="hidden" name="acao" value="salvar">
                    
                    <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?? '' ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" value="<?= $cliente['nome'] ?? '' ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control" value="<?= $cliente['cpf'] ?? '' ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" value="<?= $cliente['email'] ?? '' ?>" required>
                    </div>
                    
                    <button type="submit" class="btn <?= $cliente ? 'btn-warning' : 'btn-success' ?> w-100">
                        <?= $cliente ? 'Atualizar Cliente' : 'Salvar Cliente' ?>
                    </button>
                    <a href="lista_clientes.php" class="btn btn-link w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>