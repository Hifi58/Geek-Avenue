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
    <title>Connexion</title>
</head>
<body>

<?php require('templates/navlog.php');

$sql = "SELECT * FROM annonces";
$rs = $db->prepare($sql);
$rs->execute();?>
<section>
<?php while($data = $rs->fetch()){?>
    
<div class="annoncescontainer">  
    <div class="annonceswrapper">       
        <h2><?php echo $data['titre']; ?></h2>
        <h4><?php echo $data['lieu']; ?></h4>
        <p><?php echo $data['contenu']; ?></p>
        <p><?php echo $data['prix']. '€'; ?></p>
        <p><?php echo $data['date_publication']; ?></p>
        <button class="three show"><a href="show.php">Voir</a></button>
    </div>  
</div>
<br/>          
<?php
};
?>
</section>

</body>
</html>