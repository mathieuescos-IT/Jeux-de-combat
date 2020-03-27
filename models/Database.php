<?php

class Database {
    const HOST = 'localhost';
    const DBNAME = 'db';
    const USERNAME = 'userdb';
    const PASSWORD = '';
    private static $obj;

    private static function getConn() {
        if(!isset(self::$obj)) {
            self::$obj = new PDO('mysql:host='.self::HOST.'; dbname='.self::DBNAME.'; charset=utf8', self::USERNAME, self::PASSWORD);
        }
        return self::$obj;
    }

    public static function getAllCharacters() {
        $bdd = self::getConn();
        $stmt = $bdd->prepare('SELECT * FROM characters');
        $stmt->execute();
        $characters = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $characters;
    }

    public static function getOneCharacter($id) {
        $bdd = self::getConn();
        $stmt = $bdd->prepare('SELECT * FROM characters WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $character = $stmt->fetch(PDO::FETCH_ASSOC);
        return $character;
    }
}
