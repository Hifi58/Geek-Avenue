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

$file_name = $_FILES['image']['name'];
$file_infos = pathinfo($file_name);
$file_extension = $file_infos['extension'];
$extensions_allowed = array("jpeg", "jpg", "png","gif","");
$folder = "../style/images/";

if (!(in_array($file_extension, $extensions_allowed)))
    {
        echo "L'image n'a pas été ajoutée car cette extension de fichier n'est pas autorisée !";
        
    }
    elseif($_FILES['image']['size'] >= 1000000000)
    {
        echo "L'image est trop lourde !";
    }
    else
    {    
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder.$file_name))
        {
            $file_name_for_db = "/" .$file_name;
            $sql = "INSERT INTO annonces(id_users, titre, contenu, prix, date_publication, lieu, image, id_categories)VALUES($id_users, '$title', '$description', '$price', '$date', '$place','$file_name_for_db', $categories)";
            $rs = $db->prepare($sql);
            $rs->execute();
        }elseif(empty($_FILES["image"]["tmp_name"])){
            $sql = "INSERT INTO annonces(id_users, titre, contenu, prix, date_publication, lieu, image, id_categories)VALUES($id_users, '$title', '$description', '$price', '$date', '$place', NULL, $categories)";
            $rs = $db->prepare($sql);
            $rs->execute();
        }else
        {
            echo "Erreur d'Upload";
        }
    }


echo ("<script LANGUAGE='JavaScript'>
window.alert('Ajout effectué');
 window.location.href='../perso.php';
 </script>");