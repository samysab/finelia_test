<?php

// Db Manager Class


class DBManager {

    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=finelia_test', 'root', '');

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getConn(){
        return new PDO('mysql:host=localhost;dbname=finelia_test', 'root', '');
    }
}
?>
