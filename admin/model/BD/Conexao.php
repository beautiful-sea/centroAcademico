<?php
class Conexao{

    public static $instancia;
  
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            self::$instancia = new PDO('mysql:host=localhost;dbname=centro_academico', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instancia->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
  
        return self::$instancia;
    }

}

