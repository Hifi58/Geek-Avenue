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
    <link rel="stylesheet" href="./style/home.css">
    <title>Accueil</title>
</head>
<body>

<?php require('templates/navlog.php');?>
<div class="categories">
    <ul>
        <li><a href="comics.php">Comics</a></li>
        <li><a href="manga.php">Mangas</a></li>
        <li><a href="bd.php">Bande dessinées</a></li>
        <li><a href="goodies.php">Goodies</a></li>
    </ul>
</div>

<?php

//Code de la pagination
if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = (int) strip_tags($_GET['page']);
}else{
    $page = 1;
}

$sql = 'SELECT COUNT(*) AS nb_annonces FROM annonces';
$rs = $db->prepare($sql);
$rs->execute();

// Récuperation du nbr d'articles
$result = $rs->fetch();
$nbannonces = (int) $result['nb_annonces'];

// Nbr d'article par page
$inonepage = 4;

// calcule du nbr de page
$nbpages = ceil($nbannonces/$inonepage);

// Calcul de la première annonce de la page
$firstone = ($page * $inonepage) - $inonepage;

//Code d'affichage des articles
$sql = "SELECT * FROM annonces ORDER BY date_publication DESC LIMIT :firstone,:inonepage;";
$rs = $db->prepare($sql);
$rs->bindValue(':firstone', $firstone, PDO::PARAM_INT);
$rs->bindValue(':inonepage', $inonepage, PDO::PARAM_INT);
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
<div class="containerpage">
    <ul class="pagination" >
        <?php for($nbpage = 1; $nbpage <= $nbpages; $nbpage++):?>
            <li><a href="./?page=<?= $nbpage ?>" ><?= $nbpage ?></a></li>
        <?php endfor ?>
    </ul>
</div>
</section>

</body>
</html>