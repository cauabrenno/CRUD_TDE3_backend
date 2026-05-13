<?php

class Cliente {
    private $id_cliente;
    private $nome;
    private $cpf;
    private $email;

    public function __construct($nome = null, $cpf = null, $email = null, $id_cliente = null) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->id_cliente = $id_cliente;
    }

    public function getIdCliente() { return $this->id_cliente; }
    public function setIdCliente($id) { $this->id_cliente = $id; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getCpf() { return $this->cpf; }
    public function setCpf($cpf) { $this->cpf = $cpf; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }
}