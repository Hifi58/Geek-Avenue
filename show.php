<?php
require_once('sql/connection.php');
session_start();
require("Function/hote.php");
if(!isconnected()){
   header("location: login.php");
exit(); 

}
$id_annonces = $_GET['id_annonces'];
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
$sql = "SELECT * FROM annonces WHERE id_annonces = :id_annonces ";
$rs = $db->prepare($sql);
$rs->bindParam(':id_annonces', $id_annonces, PDO::PARAM_INT);
$rs->execute();
$result = $rs->fetchAll((PDO::FETCH_ASSOC))?>
<section>
<div class="containerdetail">
   <?php foreach($result as $data){?>

       <div class="annoncesdetail">       
         <img src="style/images<?php echo $data['image'];?>" width="400px">
         <div class="annoncescontent">
            <h2><?php echo $data['titre']; ?></h2>
            <p>Publié le <?php echo $data['date_publication']; ?></p>
            <p>à <?php echo $data['lieu']; ?></p>
            <p><?php echo $data['contenu']; ?></p>
            <p><?php echo $data['prix']. '€'; ?></p>
            <button class="three show">Contact</button>
         </div>
       </div>  

   <?php
   };
   ?>
</div>  
</section>
</body>
</html>
