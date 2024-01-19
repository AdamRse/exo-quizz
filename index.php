<?php
require_once "./php/headers/init.php";
ob_start();
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
    $scripts[]="./js/init.js";

    // echo "<pre>";
    // var_dump($_GET, $_POST, $_REQUEST);
    // echo "</pre>";
    if(!empty($_REQUEST["s"])){
        $section = strtolower($_REQUEST["s"]);

        $page = "./page/".$section."/ctrl.php";
        $js = "./js/".$section.".js";

        if(file_exists($js)) $scripts[]=$js;
        if(is_file($page)){
            require $page;
        }
        else{
            require "./page/scores/ctrl.php";
        }
        
    }
    else{
        $scripts[]="./js/formConexion.js";
        require "./page/formConexion.php";
    }
        

    require "./page/footer.php";
    ?>
</body>
</html>
<?php
ob_end_flush();