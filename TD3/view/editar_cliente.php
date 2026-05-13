<?php
require_once '../dao/ClienteDAO.php';
$id = $_GET['id'];
$dao = new ClienteDAO();
$cliente = $dao->buscarPorId($id);
?>
<form action="../controller/ClienteController.php" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">
    
    <div class="mb-3">
        <label class="form-label">Nome Completo</label>
        <input type="text" name="nome" class="form-control" value="<?= $cliente['nome'] ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Atualizar Dados</button>
</form>