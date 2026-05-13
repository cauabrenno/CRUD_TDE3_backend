<?php

class Conexao {
    private static $instancia;

    public static function getConexao() {
        if (!isset(self::$instancia)) {
            try {
                $host = 'localhost';
                $port = '5432';
                $dbname = 'agencia_viagens';
                $user = 'postgres';
                $password = 'caua';

                $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

                self::$instancia = new PDO($dsn, $user, $password);
                
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                die("Erro ao conectar com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}