<?php
require_once '../config/Conexao.php';
require_once '../model/Destino.php';

class DestinoDAO {
    
    public function salvar(Destino $destino) {
        try {
            $sql = "INSERT INTO Destino (nome_local, valor_passagem) VALUES (?, ?)";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $destino->getNomeLocal());
            $p_sql->bindValue(2, $destino->getValorPassagem());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao salvar destino: " . $e->getMessage();
        }
    }

    public function atualizar(Destino $destino, $id_destino) {
        try {
            $sql = "UPDATE Destino SET nome_local = ?, valor_passagem = ? WHERE id_destino = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $destino->getNomeLocal());
            $p_sql->bindValue(2, $destino->getValorPassagem());
            $p_sql->bindValue(3, $id_destino);
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao atualizar destino: " . $e->getMessage();
        }
    }

    public function buscarPorId($id_destino) {
        try {
            $sql = "SELECT * FROM Destino WHERE id_destino = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id_destino);
            $p_sql->execute();
            return $p_sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao buscar destino: " . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM Destino ORDER BY nome_local";
            $result = Conexao::getConexao()->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao listar destinos: " . $e->getMessage();
        }
    }

    public function eliminar($id_destino) {
        try {
            $sql = "DELETE FROM Destino WHERE id_destino = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id_destino);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao eliminar destino: " . $e->getMessage();
        }
    }
}