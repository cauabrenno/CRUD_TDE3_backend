<?php
require_once '../dao/ClienteDAO.php';
require_once '../dao/DestinoDAO.php';
require_once '../dao/ReservaDAO.php';

$id_reserva = $_GET['id'] ?? null;
$reserva = $id_reserva ? (new ReservaDAO())->buscarPorId($id_reserva) : null;

$clientes = (new ClienteDAO())->listar();
$destinos = (new DestinoDAO())->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card mx-auto shadow" style="max-width: 600px;">
        <div class="card-header bg-dark text-white text-center">
            <h2><?= $reserva ? 'Editar Reserva' : 'Nova Reserva' ?></h2>
        </div>
        <div class="card-body">
            <form action="../controller/ReservaController.php" method="POST">
                <input type="hidden" name="acao" value="salvar">
                <input type="hidden" name="id_reserva" value="<?= $reserva['id_reserva'] ?? '' ?>">
                
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="id_cliente" class="form-select" required>
                        <option value="">Selecione o Cliente</option>
                        <?php foreach($clientes as $c): ?>
                            <option value="<?= $c['id_cliente'] ?>" <?= ($reserva && $reserva['id_cliente'] == $c['id_cliente']) ? 'selected' : '' ?>>
                                <?= $c['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Destino</label>
                    <select name="id_destino" class="form-select" required>
                        <option value="">Selecione o Destino</option>
                        <?php foreach($destinos as $d): ?>
                            <option value="<?= $d['id_destino'] ?>" <?= ($reserva && $reserva['id_destino'] == $d['id_destino']) ? 'selected' : '' ?>>
                                <?= $d['nome_local'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data da Viagem</label>
                    <input type="date" name="data_reserva" class="form-control" value="<?= $reserva['data_reserva'] ?? '' ?>" required>
                </div>

                <button type="submit" class="btn btn-dark w-100">
                    <?= $reserva ? 'Atualizar Reserva' : 'Confirmar Reserva' ?>
                </button>
                <a href="lista_reservas.php" class="btn btn-link w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>