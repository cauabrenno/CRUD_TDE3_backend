<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agência de Viagens - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h1>Painel da Agência de Viagens</h1>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <h3>Clientes</h3>
                        <a href="/view/lista_clientes.php" class="btn btn-outline-primary w-100 mb-2">Novo Cliente</a>
                        <a href="lista_clientes.php" class="btn btn-primary w-100">Ver Lista</a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h3>Destinos</h3>
                        <a href="form_destino.php" class="btn btn-outline-success w-100 mb-2">Novo Destino</a>
                        <a href="lista_destinos.php" class="btn btn-success w-100">Ver Lista</a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h3>Reservas</h3>
                        <a href="form_reserva.php" class="btn btn-outline-dark w-100 mb-2">Nova Reserva</a>
                        <a href="lista_reservas.php" class="btn btn-dark w-100">Ver Lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>