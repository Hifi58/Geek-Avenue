<?php

require_once('connection.php');
session_start();

$title = addslashes(htmlspecialchars($_POST['titre']));
$description = addslashes(htmlspecialchars($_POST['contenu']));
$price = $_POST['prix'];
$date = $_POST['date_publication'];
$place = addslashes(htmlspecialchars($_POST['lieu']));
$categories = $_POST['id_categories'];
$id_users= $_SESSION['id_users'];

$db->exec("INSERT INTO annonces(id_users, titre, contenu, prix, date_publication, lieu, id_categories)VALUES($id_users, '$title', '$description', '$price', '$date', '$place', $categories)");

echo ("<script LANGUAGE='JavaScript'>
window.alert('Ajout effectué');
 window.location.href='../index_crud.php';
 </script>");