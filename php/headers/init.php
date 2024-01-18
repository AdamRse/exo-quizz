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

require "./php/classes/Bdd.class.php";

define("USER", (empty($_SESSION["user"]) ?false:$_SESSION['user']['pseudo']));

//setcookie('AdamQuizz',$_SERVER['HTTP_USER_AGENT'].'!+'.$pseudoUser, time()+3600*10);