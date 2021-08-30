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
    <link rel="icon" type="image/png" href="style/images/logo.png" />
    <title>Accueil</title>
    <script src="https://unpkg.com/@webcreate/infinite-ajax-scroll@^3.0.0-beta.6/dist/infinite-ajax-scroll.min.js"></script>
</head>
<body>

<?php require('templates/navlog.php');?>


<div class="annonces">
    <div class="categories">
        <ul>
            <li><a href="comics.php">Comics</a></li>
            <li><a href="manga.php">Mangas</a></li>
            <li><a href="bd.php">Bande-dessinées</a></li>
            <li><a href="goodies.php">Goodies</a></li>
        </ul>
    </div>
<?php
//pagination
$annoncesParPage= 8;
$annoncesTotalesReg= $db->query('SELECT id_annonces FROM annonces');
$annoncesTotales= $annoncesTotalesReg->rowCount();
$pagesTotales= ceil($annoncesTotales/$annoncesParPage);


if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
}else{
    $pageCourante = 1;
}

$depart = ($pageCourante-1)*$annoncesParPage;

//Code d'affichage des articles
$sql = "SELECT * FROM annonces ORDER BY date_publication DESC LIMIT $depart ,$annoncesParPage";
$rs = $db->prepare($sql);
$rs->execute();?>

<section class="index_crud">
<div id="annonces">
<?php while($data = $rs->fetch()){?>
    
<div class="annoncescontainer">  
    <div class="annonceswrapper">       
        <span class="comicstitle"><h2><?php echo $data['titre']; ?></h2></span>
        <span class="comicsplace"><h4><?php echo $data['lieu']; ?></h4></span>
        <span class="comicsprice"><p><?php echo $data['prix']. '€'; ?></p></span>
        <span class="comicsdate"><p><?php echo $data['date_publication']; ?></p></span>
        <button class="three show"><?php echo "<a href= show.php?id_annonces=" . $data['id_annonces'] . ">Voir</a>"?></button>
    </div>  
</div>
         
<?php
};?>
</div>
<div id="spinner1" class="spinner">Chargement...</div>
<div class="pagination">
<?php
for($i=1;$i<= $pagesTotales; $i++){
    if($i == $pageCourante){
        echo $i. ' ';
    }elseif($i == $pageCourante+1){
        echo'<a href="index_crud.php?page='.$i.'" class="next">'.$i.'</a> ';
    }else{
        echo'<a href="index_crud.php?page='.$i.'">'.$i.'</a> ';
    }
}
?>
</div>
</section>

<script> 
let ias = new InfiniteAjaxScroll('#annonces', {
  item: '.annoncescontainer',
  next: '.next',
  spinner: '.spinner',
  pagination: '.pagination'
});
</script>

</body>
</html>