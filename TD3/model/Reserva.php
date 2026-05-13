<?php

class Reserva {
    private $id_reserva;
    private $id_cliente;
    private $id_destino;
    private $data_reserva;

    public function __construct($id_cliente = null, $id_destino = null, $data_reserva = null, $id_reserva = null) {
        $this->id_cliente = $id_cliente;
        $this->id_destino = $id_destino;
        $this->data_reserva = $data_reserva;
        $this->id_reserva = $id_reserva;
    }

    public function getIdReserva() { return $this->id_reserva; }
    public function setIdReserva($id) { $this->id_reserva = $id; }

    public function getIdCliente() { return $this->id_cliente; }
    public function setIdCliente($id) { $this->id_cliente = $id; }

    public function getIdDestino() { return $this->id_destino; }
    public function setIdDestino($id) { $this->id_destino = $id; }

    public function getDataReserva() { return $this->data_reserva; }
    public function setDataReserva($data) { $this->data_reserva = $data; }
}