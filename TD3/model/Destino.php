<?php

class Destino {
    private $id_destino;
    private $nome_local;
    private $valor_passagem;

    public function __construct($nome_local = null, $valor_passagem = null, $id_destino = null) {
        $this->nome_local = $nome_local;
        $this->valor_passagem = $valor_passagem;
        $this->id_destino = $id_destino;
    }

    public function getIdDestino() { return $this->id_destino; }
    public function setIdDestino($id) { $this->id_destino = $id; }

    public function getNomeLocal() { return $this->nome_local; }
    public function setNomeLocal($nome) { $this->nome_local = $nome; }

    public function getValorPassagem() { return $this->valor_passagem; }
    public function setValorPassagem($valor) { $this->valor_passagem = $valor; }
}