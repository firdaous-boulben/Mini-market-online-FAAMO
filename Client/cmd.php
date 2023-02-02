<?php
require("../controllers/model/model.php");

if(isset($_GET['action'])){
	$conn = DbConnect();
	$id_client = $_GET['id'];
	$panier = afficher_panier($id_client);
	while ($row = $panier->fetch()) {
		$insert_query = $conn->prepare("INSERT INTO commande(id_prod,id_client) VALUES(?,?)");
		$insert_query->execute(array($row['id_produit'],$id_client));
	}
    header("location:panier.php?id=".$_GET['id']."&Login=".$_GET['Login']);

	if($insert_query){
		$message[] = 'Votre commande a bien été effectuée.';
	 }else{
		$message[] = 'Impossible d\'effectuer la commande.';
	 }
};
?>