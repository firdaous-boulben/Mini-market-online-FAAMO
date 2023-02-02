<?php
require("model/model.php");

if($_GET["action"]==="inscription"){
    $nom = $_POST['Nom'];
	$prenom = $_POST['Prenom'];
    $email = $_POST['Email'];
	$numero = $_POST['Telephone'];
	$password = $_POST['Mot_de_passe'];
	$adresse = $_POST['Adresse'];
    inscription($nom,$prenom,$email,$numero,$password,$adresse);
    $row=connexion_declient($email,$password)->fetch();
    header('location:../Client/accueil.php?Login='. $row['Prenom'].'&id='.$row['id_client']);
}

if($_GET["action"]==="profile"){
    $a=$_GET["id"];
    $row=profil($a);
    $client=$row->fetch();
    header('location:../Client/profil_client.php?Login='. $row['Prenom'].'&id='.$row['id_client']);
}

if($_GET["action"]==="panier"){
    $idc=$_GET["id"];
    $idp=$_GET["idp"];
    $Login=$_GET["Login"];
    $req=ajouter_panier($idc,$idp);
    header('location:../Client/catalogue_par_categorie.php?id='.$idc.'&Login='.$Login);
}
?>