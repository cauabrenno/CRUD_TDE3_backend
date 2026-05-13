<?php
require_once '../dao/ReservaDAO.php';
$dao = new ReservaDAO();
$reservas = $dao->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Reservas Realizadas</h2>
        <a href="form_reserva.php" class="btn btn-dark">Nova Reserva</a>
    </div>

    <table class="table table-bordered table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Destino</th>
                <th>Data da Viagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if($reservas): foreach($reservas as $r): ?>
            <tr>
                <td><?= $r['id_reserva'] ?></td>
                <td><?= $r['nome_cliente'] ?></td>
                <td><?= $r['destino'] ?></td>
                <td><?= date('d/m/Y', strtotime($r['data_reserva'])) ?></td>
                <td>
                    <a href="../controller/ReservaController.php?acao=excluir&id=<?= $r['id_reserva'] ?>" 
                       class="btn btn-outline-danger btn-sm" 
                       onclick="return confirm('Excluir esta reserva?')">Cancelar</a>
                </td>
            </tr>
            <?php endforeach; else: ?>
            <tr><td colspan="5" class="text-center">Nenhuma reserva cadastrada.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Voltar ao Menu</a>
</body>
</html>