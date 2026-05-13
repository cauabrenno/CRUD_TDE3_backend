<?php
require_once '../model/Funcionario.php';
require_once '../dao/FuncionarioDAO.php';

class FuncionarioController {
    private $dao;

    public function __construct() {
        $this->dao = new FuncionarioDAO();
    }

    public function cadastrar($nome, $cargo, $salario) {
        $func = new Funcionario($nome, $cargo, $salario);
        return $this->dao->salvar($func);
    }
}