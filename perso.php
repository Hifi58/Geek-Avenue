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
    <link rel="stylesheet" href="./style/home.css">
    <title>Espace Perso</title>
</head>
<body>

<?php require('templates/navlog.php');

$rs = $db->prepare("SELECT * FROM annonces INNER JOIN users ON users.id_users=annonces.id_users WHERE annonces.id_users=:id_users ORDER BY annonces.date_publication DESC");
$rs->bindParam(':id_users', $id_users);
$rs->execute();?>

  <div class="new">
    <button class="three show"><a href="new.php">Ajouter</a></button>
</div>
<section>

<?php while($data = $rs->fetch()){?>
<div class="annoncescontainer">  
    <div class="annonceswrapper">       
        <h2><?php echo $data['titre']; ?></h2>
        <h4><?php echo $data['lieu']; ?></h4>
        <p><?php echo $data['contenu']; ?></p>
        <p><?php echo $data['prix']. '€'; ?></p>
        <p><?php echo $data['date_publication']; ?></p>
        <button class="three update"><?php echo "<a href= edit.php?id_annonces=" . $data['id_annonces'] . "&titre=" . urlencode($data['titre']) . "&lieu=" . urlencode($data['lieu']) . "&contenu=" . urlencode($data['contenu']) . "&prix=" . $data['prix'] . "&image".$data['image'] . "&date_publication=" . $data['date_publication']. '>Modifier</a>' ?></button>
        <button class="three delete"><?php echo "<a href= sql/delete.php?id_annonces=" . $data['id_annonces'] . ">Supprimer</a>"?></button>  
    </div>
</div>
<?php
};
?>  



</section>
</body>
</html>