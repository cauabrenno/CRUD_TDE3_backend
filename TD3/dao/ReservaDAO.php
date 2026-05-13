<?php
require_once '../config/Conexao.php';
require_once '../model/Reserva.php';

class ReservaDAO {
    
    public function salvar(Reserva $reserva) {
        try {
            $sql = "INSERT INTO Reserva (id_cliente, id_destino, data_reserva) VALUES (?, ?, ?)";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $reserva->getIdCliente());
            $p_sql->bindValue(2, $reserva->getIdDestino());
            $p_sql->bindValue(3, $reserva->getDataReserva());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao salvar reserva: " . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT r.id_reserva, c.nome as nome_cliente, d.nome_local as destino, r.data_reserva 
                    FROM Reserva r
                    JOIN Cliente c ON r.id_cliente = c.id_cliente
                    JOIN Destino d ON r.id_destino = d.id_destino
                    ORDER BY r.data_reserva DESC";
            
            $result = Conexao::getConexao()->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao listar reservas: " . $e->getMessage();
        }
    }

    public function eliminar($id) {
        try {
            $sql = "DELETE FROM Reserva WHERE id_reserva = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao eliminar reserva: " . $e->getMessage();
        }
    }
}