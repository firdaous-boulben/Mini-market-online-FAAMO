<?php
$conn=new PDO ('mysql:host=localhost;dbname=faamo_database;charset=utf8', 'root', '');

function DbConnect(){
	try {
    	$database = new PDO ('mysql:host=localhost;dbname=faamo_database;charset=utf8', 'root', '');
    	return $database;
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}
}
function connexion_declient($login,$password){
    $conn=DbConnect();
    session_start();
    $stat=$conn->prepare("SELECT * FROM clients WHERE Mot_de_passe=?AND Email =?");
    $stat->execute([$password,$login]);
    return $stat;
}
function inscription($nom,$prenom,$email,$numero,$password,$adresse){
    $conn=DbConnect();
    $req = $conn->prepare('INSERT INTO clients (Nom,Prenom,Email,Telephone,Mot_de_passe,Adresse) VALUES(?,?,?,?,?,?)');
   $req->execute(array($nom,$prenom,$email,$numero,$password,$adresse));
}
function All_produit(){
    $conn=DbConnect();
    $req= $conn->prepare("SELECT * from produits ORDER BY Nom_produit");
    $req->execute();
    return $req;
}
function profil($id){
    $conn=DbConnect();
    $req= $conn->prepare("SELECT * from clients WHERE id_client =?");
    $req->execute([$id]);
    return $req;  
}
function ajouter_panier($id_client,$id_produit){
    $conn=DbConnect();
    $req= $conn->prepare("INSERT INTO panier(id_produit,id_client) VALUES(?,?)");
    $req->execute(array($id_produit,$id_client));
    return $req;
}
function afficher_panier($idc){
    $conn=DbConnect();
    $req= $conn->prepare("SELECT * FROM produits INNER JOIN panier WHERE produits.id_produit=panier.id_produit AND panier.id_client=?");
    $req->execute([$idc]);
    return $req;  
}
function supprimer_panier($idc,$idp){
    $conn=DbConnect();
    $req= $conn->prepare("DELETE FROM panier WHERE id_produit=? AND id_client=?");
    $req->execute([$idp,$idc]);
}
function afficher_client($idc){
    $conn=DbConnect();
    $req= $conn->prepare("SELECT * FROM clients WHERE id_client=?");
    $req->execute([$idc]);
    return $req;
}