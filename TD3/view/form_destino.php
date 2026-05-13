<?php
require_once '../dao/DestinoDAO.php';
$id_destino = $_GET['id'] ?? null;
$destino = $id_destino ? (new DestinoDAO())->buscarPorId($id_destino) : null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Destino</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow" style="max-width: 500px;">
            <div class="card-header <?= $destino ? 'bg-warning' : 'bg-primary' ?> text-white">
                <h3><?= $destino ? 'Editar Destino' : 'Cadastrar Destino' ?></h3>
            </div>
            <div class="card-body">
                <form action="../controller/DestinoController.php" method="POST">
                    <input type="hidden" name="acao" value="salvar">
                    <input type="hidden" name="id_destino" value="<?= $destino['id_destino'] ?? '' ?>">
                    <div class="mb-3">
                        <label class="form-label">Nome do Local</label>
                        <input type="text" name="nome_local" class="form-control" value="<?= $destino['nome_local'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor da Passagem</label>
                        <input type="number" step="0.01" name="valor_passagem" class="form-control" value="<?= $destino['valor_passagem'] ?? '' ?>" required>
                    </div>
                    <button type="submit" class="btn <?= $destino ? 'btn-warning' : 'btn-primary' ?> w-100">
                        <?= $destino ? 'Atualizar Destino' : 'Salvar Destino' ?>
                    </button>
                    <a href="lista_destinos.php" class="btn btn-link w-100 mt-2">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>