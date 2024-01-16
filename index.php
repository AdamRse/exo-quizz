<?php
require_once "./php/headers/init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Adam quizz !</title>
</head>
<body>
    <?php
    require "./page/header.php";
    $scripts[]="init.js";

    if(USER){
        if(!empty($_POST["s"])){
            $session = "./page/".strtolower($_POST["s"])."ctrl.php";

            if(is_file($session)){
                require $session;
            }
            else{
                require "./page/scores/ctrl.php";
            }
            
        }
    }
    else{
        $scripts[]="formConexion.js";
        require "./page/formConexion.php";
    }
        

    require "./page/footer.php";
    ?>
</body>
</html>