<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../model/Destino.php';
require_once '../dao/DestinoDAO.php';

class DestinoController {
    private $dao;

    public function __construct() {
        $this->dao = new DestinoDAO();
    }

    public function processarAcao($post, $get) {
        $acao = $post['acao'] ?? $get['acao'] ?? null;

        switch ($acao) {
            case 'salvar':
                $destino = new Destino($post['nome_local'], $post['valor_passagem']);
                
                if ($this->dao->salvar($destino)) {
                    header("Location: ../view/lista_destinos.php");
                    exit;
                } else {
                    echo "Erro ao salvar o destino no banco de dados.";
                }
                break;

            case 'excluir':
                $id = $get['id'] ?? null;
                if ($id) {
                    $this->dao->eliminar($id);
                }
                header("Location: ../view/lista_destinos.php");
                exit;
                break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['acao'])) {
    $controller = new DestinoController();
    $controller->processarAcao($_POST, $_GET);
}