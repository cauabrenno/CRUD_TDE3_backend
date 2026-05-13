<?php
require_once '../dao/ClienteDAO.php';
require_once '../dao/DestinoDAO.php';
$cDAO = new ClienteDAO();
$dDAO = new DestinoDAO();
$clientes = $cDAO->listar();
$destinos = $dDAO->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header bg-dark text-white text-center"><h2>Nova Reserva</h2></div>
        <div class="card-body">
            <form action="../controller/ReservaController.php" method="POST">
                <input type="hidden" name="acao" value="salvar">
                
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="id_cliente" class="form-select" required>
                        <option value="">Selecione o Cliente</option>
                        <?php foreach($clientes as $c): ?>
                            <option value="<?= $c['id_cliente'] ?>"><?= $c['nome'] ?> (CPF: <?= $c['cpf'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Destino de Viagem</label>
                    <select name="id_destino" class="form-select" required>
                        <option value="">Selecione o Destino</option>
                        <?php foreach($destinos as $d): ?>
                            <option value="<?= $d['id_destino'] ?>"><?= $d['nome_local'] ?> - R$ <?= number_format($d['valor_passagem'], 2, ',', '.') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data da Viagem</label>
                    <input type="date" name="data_reserva" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-dark w-100">Confirmar Reserva</button>
                <a href="index.php" class="btn btn-link w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>