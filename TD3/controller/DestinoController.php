<?php
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
                
                if (isset($post['id_destino']) && !empty($post['id_destino'])) {
                    if ($this->dao->atualizar($destino, $post['id_destino'])) {
                        header("Location: ../view/lista_destinos.php");
                        exit;
                    }
                } else {
                    if ($this->dao->salvar($destino)) {
                        header("Location: ../view/lista_destinos.php");
                        exit;
                    }
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