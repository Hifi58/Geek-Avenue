<?php
require_once('sql/connection.php');
session_start();
require("Function/hote.php");
if(!isconnected()){
   header("location: login.php");
exit(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/comics.css">
    <link rel="icon" type="image/png" href="style/images/logo.png" />
    <title>Accueil</title>
</head>
<body>

<nav>
    <div class="logo">
        <a href="index_crud.php"><img src="style/images/super.png" width="300px" alt="logo"/></a>
        <h1>Geek Avenue</h1>
    </div>
    <ul>
        <li><a href="perso.php">Espace Perso</a></li>
        <li><a href="logout.php">Déconnexion</a></li>
    </ul>
</nav>
<div class="categories">
    <ul>
        <li><a href="comics.php">Comics</a></li>
        <li><a href="manga.php">Mangas</a></li>
        <li><a href="bd.php">Bande dessinées</a></li>
        <li><a href="goodies.php">Goodies</a></li>
    </ul>
</div>

<?php
$sql = "SELECT * FROM annonces INNER JOIN categories ON categories.id_categories=annonces.id_categories WHERE annonces.id_categories = 1 ORDER BY annonces.date_publication DESC";
$rs = $db->prepare($sql);
$rs->execute();?>
<section>
<?php while($data = $rs->fetch()){?>
    
<div class="annoncescontainer" background-image="url('style/images<?php echo $data['image'];?>')">  
    <div class="annonceswrapper">       
        <h2><?php echo $data['titre']; ?></h2>
        <h4><?php echo $data['lieu']; ?></h4>
        <!-- <p><?php echo $data['contenu']; ?></p> -->
        <p><?php echo $data['prix']. '€'; ?></p>
        <!-- <img src="style/images<?php echo $data['image'];?>" width="150px"> -->
        <p><?php echo $data['date_publication']; ?></p>
        <button class="three show"><?php echo "<a href= show.php?id_annonces=" . $data['id_annonces'] . ">Voir</a>"?></button>
    </div>  
</div>
<br/>          
<?php
};
?>
</section>

</body>
</html>