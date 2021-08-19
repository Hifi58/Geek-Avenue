<?php
session_start();
require_once('connection.php');
?>

<?php


$id_annonces = $_GET['id_annonces'];
$id_users= $_SESSION['id_users'];

$delete=$db->prepare("DELETE annonces FROM annonces INNER JOIN users ON annonces.id_users = users.id_users WHERE annonces.id_annonces=:id_annonces");
$delete->bindParam(':id_annonces', $id_annonces);
$delete->execute();

echo ("<script LANGUAGE='JavaScript'>
window.alert('Suppression effectué');
window.location.href='../perso.php';
</script>");