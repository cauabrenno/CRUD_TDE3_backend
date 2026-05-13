<?php
require_once '../model/Reserva.php';
require_once '../dao/ReservaDAO.php';

class ReservaController {
    private $dao;

    public function __construct() {
        $this->dao = new ReservaDAO();
    }

    public function processarAcao($post, $get) {
        $acao = $post['acao'] ?? $get['acao'] ?? null;

        switch ($acao) {
            case 'salvar':
                $reserva = new Reserva($post['id_cliente'], $post['id_destino'], $post['data_reserva']);
                
                if (isset($post['id_reserva']) && !empty($post['id_reserva'])) {
                    if ($this->dao->atualizar($reserva, $post['id_reserva'])) {
                        header("Location: ../view/lista_reservas.php");
                        exit;
                    }
                } else {
                    if ($this->dao->salvar($reserva)) {
                        header("Location: ../view/lista_reservas.php");
                        exit;
                    }
                }
                break;

            case 'excluir':
                $id = $get['id'] ?? null;
                if ($id) {
                    $this->dao->eliminar($id);
                }
                header("Location: ../view/lista_reservas.php");
                exit;
                break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['acao'])) {
    $controller = new ReservaController();
    $controller->processarAcao($_POST, $_GET);
}