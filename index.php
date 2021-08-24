<?php
require_once('sql/connection.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/home.css">
    <title>Geek Avenue</title>
</head>
<body>
    <?php require('templates/nav.html');

    $sql = "SELECT * FROM annonces LIMIT 0,8";
    $rs = $db->prepare($sql);
    $rs->execute();?>
<section class="select"> 
<?php while($data = $rs->fetch()){?>

    <div class="annoncescontainer">  
        <div class="annonceswrapper">       
            <h2><?php echo $data['titre']; ?></h2>
            <h4><?php echo $data['lieu']; ?></h4>
            <p><?php echo $data['prix']. '€'; ?></p>
            <p><?php echo $data['date_publication']; ?></p>
            <h3>Inscrit toi pour en savoir plus ! ! !</h3>
        </div>  
    </div>
       
<?php
};
?>
</section> 
</body>
</html>