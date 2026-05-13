<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../model/Cliente.php';
require_once '../dao/ClienteDAO.php';

class ClienteController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ClienteDAO();
    }

    public function processarAcao($post, $get)
    {
        $acao = $post['acao'] ?? $get['acao'] ?? null;

        switch ($acao) {
            case 'salvar':
                $cliente = new Cliente($post['nome'], $post['cpf'], $post['email']);

                if ($this->dao->salvar($cliente)) {
                    header("Location: ../view/lista_clientes.php");
                    exit;
                } else {
                    echo "Erro ao salvar no banco de dados.";
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

            default:
                echo "Ação não identificada.";
                break;

            case 'editar':
                $id = $post['id_cliente'];
                $cliente = new Cliente($post['nome'], $post['cpf'], $post['email']);

                if ($this->dao->atualizar($cliente, $id)) {
                    header("Location: ../view/lista_clientes.php");
                    exit;
                } else {
                    echo "Erro ao atualizar no banco de dados.";
                }
                break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['acao'])) {
    $c = new ClienteController();
    $c->processarAcao($_POST, $_GET);
}
