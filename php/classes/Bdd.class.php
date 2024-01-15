<?php
class Bdd extends PDO{

    private $_taillePage = 6;

    private const sgbd = 'mysql';
    private const server = "127.0.0.1";
    private const db = "hospitalE2N";
    private const user = "root";
    private const pw = "";

    public function __construct(){
        $connectionString = self::sgbd.":dbname=".self::db.";host=".self::server;
        parent::__construct($connectionString, self::user, self::pw);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}