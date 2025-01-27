<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $arrayProva = [ 'user'=>'pass'];
    

    $user = $_REQUEST['user'];
    $password=$_REQUEST['pass'];

    if(isset($arrayProva[$user])&& $arrayProva[$user]==$password){
        $msg="credenziali giuste";
    }
        else {
            $smg= "credenzali errate";
        }
    
    ?>
</body>
</html>