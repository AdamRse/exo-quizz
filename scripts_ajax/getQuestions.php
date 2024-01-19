<?php
require "../php/headers/init.php";

$return = "Erreur, l'utilisateur n'est pas connecté";
if(USER){
    $questions = $Bdd->getQuestionsReponses();
    if(!empty($questions[0])){
        $return = $questions;
    }
    else{
        $return = "Impossible de récupérer les questions en Bdd : ".$Bdd->returErrorDatabase();
    }
}
echo json_encode($return);