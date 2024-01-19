<h1 class="text-3xl font-bold text-center mb-4">Quizz</h1>
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