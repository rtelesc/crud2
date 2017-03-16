<?php

define('HOST', 'localhost');
define('DBNAME', 'crud');
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWORD', '');


class Conexao {

    private static $pdo;


    private function __construct() {

    }

    public static function getInstance() {
        if (!isset(self::$pdo)) {
            try {
              // array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',  array(PDO::ATTR_PERSISTENT => true));
                self::$pdo = new \PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD);
                self::$pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }
}
