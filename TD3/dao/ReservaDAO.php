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

    public function atualizar(Reserva $reserva, $id_reserva) {
        try {
            $sql = "UPDATE Reserva SET id_cliente = ?, id_destino = ?, data_reserva = ? WHERE id_reserva = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $reserva->getIdCliente());
            $p_sql->bindValue(2, $reserva->getIdDestino());
            $p_sql->bindValue(3, $reserva->getDataReserva());
            $p_sql->bindValue(4, $id_reserva);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao atualizar reserva: " . $e->getMessage();
        }
    }

    public function buscarPorId($id_reserva) {
        try {
            $sql = "SELECT * FROM Reserva WHERE id_reserva = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id_reserva);
            $p_sql->execute();
            return $p_sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao buscar reserva: " . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT Reserva.id_reserva, Cliente.nome AS nome_cliente, Destino.nome_local AS destino, Reserva.data_reserva 
                    FROM Reserva 
                    JOIN Cliente ON Reserva.id_cliente = Cliente.id_cliente 
                    JOIN Destino ON Reserva.id_destino = Destino.id_destino
                    ORDER BY Reserva.data_reserva";
            $result = Conexao::getConexao()->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao listar reservas: " . $e->getMessage();
        }
    }

    public function eliminar($id_reserva) {
        try {
            $sql = "DELETE FROM Reserva WHERE id_reserva = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id_reserva);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao eliminar reserva: " . $e->getMessage();
        }
    }
}