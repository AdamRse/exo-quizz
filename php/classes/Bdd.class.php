<?php
class Bdd extends PDO{

    private $_error = array();

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
public function prepare(string $sql, array $opt = []): PDOStatement|false {
    return parent::prepare($sql, $opt);
}
public function returErrorDatabase(){
    $error = $this->_error;
    return (empty($this->_error[1]))?false:"Mysql renvoie une erreur : ".$error[2]."<br/>Mysql code : ".$error[1]."<br/>PDO code : ".$error[2];
}
private function noTags($string){
    return preg_replace("/<(^>)+>/", "", $string);
}
private function checkError(PDOStatement $pdoS){
    if(!empty($pdoS->errorInfo()[0])){
        $this->_error = $pdoS->errorInfo();
    }
}
public function getUserName($name){
    $rq = $this->prepare("SELECT * FROM users WHERE pseudo = ?");
    $rq->execute(array($name)); $this->checkError($rq);
    return $rq->fetch(PDO::FETCH_ASSOC);
}
public function addUser($name){
    $rt = false;
    if(!empty($name)){
        $name = $this->noTags($name);
        $q = $this->prepare("INSERT INTO users (pseudo, avatar) VALUES (:pseudo, :avatar)");
        $rt = $q->execute(["pseudo" => $name, "avatar" => "Av".rand(1, 9).".png"]); $this->checkError($q);
    }
    return $rt;
}
public function createGetUser($name){
    $rt = false;
    if($this->addUser($name)) $rt = $this->getUserName($this->lastInsertId());
    return $rt;
}
public function getQuestionsReponses($nb = 10){
    $return = false;
    $q = $this->prepare("SELECT * FROM questions ORDER BY RAND() LIMIT $nb;");
    if($q->execute()){
        $return = array();
        while($question = $q->fetch(PDO::FETCH_ASSOC)){
            $return[$question["id"]]=$question;
            foreach($this->query("SELECT good_ans, difficulty, statement as answer FROM choices WHERE id_questions = ".$question['id']) as $row){
                $return[$question['id']]['answers'][]=$row;
            }


        }
    }
    else
        $this->checkError($q);
    $q->fetchAll(PDO::FETCH_ASSOC);
    return $return;
}

}
$Bdd = new Bdd();