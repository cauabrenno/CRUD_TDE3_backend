<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Destino</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header bg-primary text-white"><h3>Cadastrar Destino</h3></div>
            <div class="card-body">
                <form action="../controller/DestinoController.php" method="POST">
                    <input type="hidden" name="acao" value="salvar">
                    <div class="mb-3">
                        <label class="form-label">Nome do Local</label>
                        <input type="text" name="nome_local" class="form-control" placeholder="Ex: Paris" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor da Passagem</label>
                        <input type="number" step="0.01" name="valor_passagem" class="form-control" placeholder="0.00" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Salvar Destino</button>
                    <a href="index.php" class="btn btn-link w-100 mt-2">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>