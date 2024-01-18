<h1>Quizz</h1>
<?php
if(USER){
    require "actions/quizz.php";
}
else{
    if(!empty($_POST["username"])){
        require "actions/getCreateUser.php";
    }
    else
        require "actions/noUser.php";
}