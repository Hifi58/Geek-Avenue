<?php
require_once('sql/connection.php');
session_start();
require("Function/hote.php");
if(!isconnected()){
   header("location: login.php");
exit(); 
}

$title = addslashes(htmlspecialchars($_GET['titre']));
$description = addslashes(htmlspecialchars($_GET['contenu']));
$price = $_GET['prix'];
$date = $_GET['date_publication'];
$place = addslashes(htmlspecialchars($_GET['lieu']));
$id_users= $_SESSION['id_users'];
$id_annonces = $_GET['id_annonces'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/home.css">
    <title>Connexion</title>
</head>
<body>

<?php require('templates/navlog.php');?>

    <section>
        <form action="sql/update.php" method="POST">

            <input type="text" placeholder="Titre" name="titre" value="<?php echo $title?>" required>
            <input type="text" placeholder="Lieu" name="lieu" value="<?php echo $place?>" required>
            <textarea placeholder="Description" name="contenu" value="<?php echo $description?>" required></textarea>
            <input type="number" step="any" placeholder="Prix" name="prix" value="<?php echo $price?>" required>
            <input type="date" name="date_publication" value="<?php echo $date?>" required>
            <input type="hidden" name="id_annonces" value="<?php echo $id_annonces?>">
            <!-- <input type="file" name="" id=""> -->
            <select name="id_categories" id="">
                <option value="1">Comics</option>
                <option value="2">Manga</option>
                <option value="3">Bande dessiné</option>
                <option value="4">Goodies</option>
            </select>
            <button type="submit">Publier</button>
            
        </form>
    </section>
</body>
</html>