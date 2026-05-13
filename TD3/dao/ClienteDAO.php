<?php
require_once '../config/Conexao.php';
require_once '../model/Cliente.php';

class ClienteDAO {
    
    public function salvar(Cliente $cliente) {
        try {
            $sql = "INSERT INTO Cliente (nome, cpf, email) VALUES (?, ?, ?)";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $cliente->getNome());
            $p_sql->bindValue(2, $cliente->getCpf());
            $p_sql->bindValue(3, $cliente->getEmail());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao salvar cliente: " . $e->getMessage();
        }
    }

    public function atualizar(Cliente $cliente, $id_cliente) {
        try {
            $sql = "UPDATE Cliente SET nome = ?, cpf = ?, email = ? WHERE id_cliente = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $cliente->getNome());
            $p_sql->bindValue(2, $cliente->getCpf());
            $p_sql->bindValue(3, $cliente->getEmail());
            $p_sql->bindValue(4, $id_cliente);
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao atualizar cliente: " . $e->getMessage();
        }
    }

    public function buscarPorId($id_cliente) {
        try {
            $sql = "SELECT * FROM Cliente WHERE id_cliente = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id_cliente);
            $p_sql->execute();
            return $p_sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao buscar cliente: " . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM Cliente ORDER BY nome";
            $result = Conexao::getConexao()->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao listar clientes: " . $e->getMessage();
        }
    }

    public function eliminar($id_cliente) {
        try {
            $sql = "DELETE FROM Cliente WHERE id_cliente = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id_cliente);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao eliminar cliente: " . $e->getMessage();
        }
    }
}