<?php 
session_start();

$name = $_POST['name'];
//hachage du mot de passe
$password = $_POST['password'];
$passwordbis = $_POST['passwordbis'];
$mail = $_POST['mail'];
$error ="";
$valider=$_POST["valider"];

//conditions de remplissages de tous les champs et de mots de passe identique + connexion table

if(isset($valider)){
if(empty($name)) $error="Veuillez remplir tous les champs";
elseif (empty($password)) $error="Veuillez remplir tous les champs";
elseif (empty($passwordbis)) $error="Veuillez remplir tous les champs";
elseif (empty($mail)) $error="Veuillez remplir tous les champs";
elseif ($password!=$passwordbis) $error="Les mots de passes ne sont pas identiques";
else{
    include('connection.php');
    $data=$db->prepare("SELECT id FROM users WHERE name=? LIMIT 1");
    $data->execute(array($name));
    $table=$data->fetchAll();
    if(count($table)>0)
        $error="Nom d'utilisateur déjà utilisé";
    else{
        $insert=$db->prepare("INSERT INTO users (name, password, mail) VALUES(?, ?, ?)");
        if($insert->execute(array($name, password_hash($password, PASSWORD_DEFAULT), $mail)))
        header("location: ../login.php");
        }
    }
}

echo $error;