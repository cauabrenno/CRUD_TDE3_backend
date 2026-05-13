<?php
require_once '../model/Cliente.php';
require_once '../dao/ClienteDAO.php';

class ClienteController {
    private $dao;

    public function __construct() {
        $this->dao = new ClienteDAO();
    }

    public function processarAcao($post, $get) {
        $acao = $post['acao'] ?? $get['acao'] ?? null;

        switch ($acao) {
            case 'salvar':
                $cliente = new Cliente($post['nome'], $post['cpf'], $post['email']);
                
                // Se o id_cliente estiver preenchido no formulário, faz o UPDATE
                if (isset($post['id_cliente']) && !empty($post['id_cliente'])) {
                    if ($this->dao->atualizar($cliente, $post['id_cliente'])) {
                        header("Location: ../view/lista_clientes.php");
                        exit;
                    }
                } 
                // Se não houver ID, faz um novo INSERT (Cadastro)
                else {
                    if ($this->dao->salvar($cliente)) {
                        header("Location: ../view/lista_clientes.php");
                        exit;
                    }
                }
                break;

            case 'excluir':
                $id = $get['id'] ?? null;
                if ($id) {
                    $this->dao->eliminar($id);
                }
                header("Location: ../view/lista_clientes.php");
                exit;
                break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['acao'])) {
    $controller = new ClienteController();
    $controller->processarAcao($_POST, $_GET);
}