<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //connexion bdd
    require_once('sql/connection.php');
    //  Récupération de l'utilisateur et de son password hashé
    $data = $db->prepare('SELECT id_users, password FROM users WHERE name = ? LIMIT 1');
    $data->execute(array($_POST['name']));
    $result = $data->fetch();
  
    if (!$result){
      echo 'Mauvais identifiant ou mot de passe !';}
    else{
      // Comparaison du password envoyé via le formulaire avec la base
      if (password_verify($_POST['password'], $result['password'])){
          session_start();
          $_SESSION['connected'] = 1;
          $_SESSION['id_users'] = $result['id_users'];
          $_SESSION['name'] = $_POST['name'];
          header("location: index_crud.php");
      }
      else {
          echo 'Mauvais identifiant ou mot de passe !';
        
      }
    }
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/home.css">
    <link rel="icon" type="image/png" href="style/images/logo.png" />
    <title>Connexion</title>
</head>
<body>

<?php require('templates/nav.html')?>

    <section>
        <form  method="post" action="" class="formlogin">
            <div>
                <span><input type="text" name="name" placeholder="Nom d'utilisateur" /><p class="eye">&#9998;</p></span>
                <span id="display"><input id="input" type="password" name="password" placeholder="Mot de passe" /><p class="eye">👁</p></span>
                <input  class="submit" type="submit" name="valider" value="Se connecter"/>
            </div>
        </form>
    </section>

    <script src="js/login.js"></script>
</body>
</html>