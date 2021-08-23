<?php
require_once('sql/connection.php');
session_start();
require("Function/hote.php");
if(!isconnected()){
   header("location: login.php");
exit(); 

$id_annonces = $_GET['id_annonces'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="Style/home.css">
   <title>Détail</title>
</head>
<body>
<?php require('templates/navlog.php');
// var_dump($id_annonces);
// die;
$sql = "SELECT * FROM annonces WHERE annonces.id_annonces = $id_annonces ";
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
