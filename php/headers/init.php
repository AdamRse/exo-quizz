<?php
session_start();
if(isset($_REQUEST["dc"])){//Déconneion
    unset($_SESSION["user"]);
    setcookie('AdamQuizz', '', -1);
}
else{
    if(empty($_SESSION["user"])){
        if(!empty($_COOKIE["AdamQuizz"])){
            
        }
    }
}

require $_SERVER['DOCUMENT_ROOT']."/php/classes/Bdd.class.php";
require $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

define("USER", (empty($_SESSION["user"]) ?false:$_SESSION['user']['pseudo']));

//setcookie('AdamQuizz',$_SERVER['HTTP_USER_AGENT'].'!+'.$pseudoUser, time()+3600*10);