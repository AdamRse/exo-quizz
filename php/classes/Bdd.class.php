<?php
class Bdd extends PDO{

    private $_taillePage = 6;

    private const sgbd = 'mysql';
    private const server = "127.0.0.1";
    private const db = "";
    private const user = "root";
    private const pw = "";

    public function __construct(){
        $connectionString = self::sgbd.":dbname=".self::db.";host=".self::server;
        parent::__construct($connectionString, self::user, self::pw);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

private function noTags($string){
    return preg_replace("/<(^>)+>/", "", $string);
}
public function getUserName($name){
    $rq = $this->prepare("SELECT * FROM users WHERE pseudo = ?");
    $rq->execute(array($name));
    return $rq->fetch(PDO::FETCH_ASSOC);
}
public function addUser($name){
    if(!empty($name)){
        $name = $this->noTags($name);
        
    }
}
}
$Bdd = new Bdd();