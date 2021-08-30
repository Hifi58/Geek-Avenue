<?php
require_once('sql/connection.php');
session_start();
require("Function/hote.php");
if(!isconnected()){
   header("location: login.php");
exit(); 
}
$id_users = $_SESSION['id_users'];
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

<?php require('templates/navlog.php');?>

    <section class="formnew">
        <form enctype="multipart/form-data" action="sql/insert.php" method="POST">

            <input type="text" placeholder="Titre" name="titre" required>
            <input type="text" placeholder="Lieu" name="lieu" required>
            <textarea placeholder="Description" name="contenu" required></textarea>
            <input type="number" step="any" placeholder="Prix" name="prix"required>
            <input type="file" name="image">
            <input type="date" name="date_publication"required>
            <select name="id_categories" id="">
                <option value="1">Comics</option>
                <option value="2">Manga</option>
                <option value="3">Bande dessiné</option>
                <option value="4">Goodies</option>
            </select>
            <button type="submit" >Publier</button>
            
        </form>
    </section>
</body>
</html>