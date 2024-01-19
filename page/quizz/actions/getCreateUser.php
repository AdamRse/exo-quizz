<?php
$user = $Bdd->getUserName($_POST["username"]);
if(empty($user)){
    $user = $Bdd->createGetUser($_POST["username"]);
    if($user){
        $_SESSION['user']=$user;
        header('location:./?s=quizz');
    }
    else{
        ?>
        <p class="text-red-500 text-center font-bold">
            Erreur en Base de données :<br/><?= $Bdd->returErrorDatabase() ?>
        </p>
        <a href="./" class="ml-10 mt-3 decoration-none">Retour</a>
        <?php
    }
}
else{
    $_SESSION['user']=$user;
    header('location:./?s=quizz');
}

