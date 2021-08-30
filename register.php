<?php
require_once('sql/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/home.css">
    <link rel="icon" type="image/png" href="style/images/logo.png" />
    <title>Inscription</title>
</head>
<body>

    <?php require('templates/nav.html')?>

    <section>
        <form action="sql/sign_up.php" method="POST" class="formlogin">
            <div>
                <input class="champs" type="text" name="name" placeholder="Nom d'utilisateur"  />
                <input type="password" name="password" placeholder="Mot de passe" id="input" />
                <input type="password" name="passwordbis" placeholder="Répétez votre mot de passe" />
                <input type="email" name="mail" placeholder="E-mail" />
                <input  class="submit" type="submit" name="valider" value="Inscription"/>
            </div>
        </form>
    </section>
</body>
</html>