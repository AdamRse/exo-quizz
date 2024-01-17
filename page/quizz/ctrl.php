<h1>Quizz</h1>
<?php
if(USER){
    require "actions/quizz.php";
}
else{
    if(!empty($_POST["username"])){
        $Bdd->getUserName($_POST["username"]);
    }
    require "actions/noUser.php";
}