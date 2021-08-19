<?php
session_start();
require_once('connection.php');

$id_annonces = $_POST['id_annonces'];
$title = addslashes(htmlspecialchars($_POST['titre']));
$description = addslashes(htmlspecialchars($_POST['contenu']));
$price = $_POST['prix'];
$date = $_POST['date_publication'];
$place = addslashes(htmlspecialchars($_POST['lieu']));
$categories = $_POST['id_categories'];

$id_users= $_SESSION['id_users'];

$sql = "UPDATE annonces SET  titre = '$title', contenu = '$description', prix = '$price', date_publication = '$date', lieu = '$place', id_categories = '$categories' WHERE  id_annonces = $id_annonces";
$rs = $db->prepare($sql);
$rs->execute();


echo $id_annonces;
 echo ("<script LANGUAGE='JavaScript'>
 window.alert('Modification effectué');
 window.location.href='../perso.php';
</script>");