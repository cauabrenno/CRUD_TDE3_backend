<?php
require_once '../config/Conexao.php';
require_once '../model/Funcionario.php';

class FuncionarioDAO {
    
    public function salvar(Funcionario $funcionario) {
        try {
            $sql = "INSERT INTO Funcionario (nome, cargo, salario) VALUES (?, ?, ?)";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $funcionario->getNome());
            $p_sql->bindValue(2, $funcionario->getCargo());
            $p_sql->bindValue(3, $funcionario->getSalario());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao salvar funcionário: " . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM Funcionario ORDER BY nome";
            $result = Conexao::getConexao()->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao listar funcionários: " . $e->getMessage();
        }
    }

    public function eliminar($id) {
        try {
            $sql = "DELETE FROM Funcionario WHERE id_funcionario = ?";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(1, $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao eliminar funcionário: " . $e->getMessage();
        }
    }
}