<?php
class Bdd extends PDO{

    private const sgbd = 'mysql';
    private const server = "127.0.0.1";
    private const db = "quizz";
    private const user = "root";
    private const pw = "";

    //connexion ordi perso
    private const pw2 = "crepuscule";
    private const user2 = "adam";

    public function __construct(){ 
        $user = self::user;
        $pw = self::pw;
        $connectionString = self::sgbd.":dbname=".self::db.";host=".self::server;
        if($_SERVER['DOCUMENT_ROOT'] == "/var/www/html"){
            $user = self::user2;
            $pw = self::pw2;
        }
        parent::__construct($connectionString, $user, $pw);
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
    $rt = false;
    if(!empty($name)){
        $name = $this->noTags($name);
        $q = $this->prepare("INSERT INTO users (pseudo, avatar) VALUES (:pseudo, :avatar)");
        $rt = $q->execute(["pseudo" => $name, "avatar" => "Av".rand(1, 9).".png"]);
    }
    return $rt;
}
}
$Bdd = new Bdd();