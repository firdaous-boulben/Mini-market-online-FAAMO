<?php ob_start();         //qui "mémorise" toute la sortie HTML qui suit ?>

<?php

if(isset($_POST['confirm_cmd'])){
	$conn = DbConnect();
	$id_client = $_GET['id'];
	$panier = afficher_panier($id_client);
	while ($row = $panier->fetch()) {
		$insert_query = $conn->prepare("INSERT INTO commande(id_prod,id_client) VALUES(?,?)");
		$insert_query->execute(array($row['id_prod'],$id_client));
	}

	if($insert_query){
		$message[] = 'Votre commande a bien été effectuée.';
	 }else{
		$message[] = 'Impossible d\'effectuer la commande.';
	 }
};
?>

<div class="container text-center" id="gestion">
	<h1>Votre panier</h1>
	<?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
            };
        };
    ?>
	<section id="display">
		<table>
			<thead>
        		<th>Produit</th>
    			<th>Nom</th>
				<th>Description</th>
				<th>Prix</th>
				<th>Actions</th>
			</thead>
			<?php
				$prix_total=0;
				while($res =$req->fetch()) {	
			?>	
    		<tr>
 				<td><?php echo '<img style="height: 125px;" class="img" src="data:image/png;base64,'.base64_encode($res["Bin"]).'" />';?></td>
        		<td><?php echo $res['Nom_produit'] ?></td>
				<td><?php echo $res['Desc_produit']?></td>
        		<td><?php echo $res['Prix_produit'] ?></td>
				<td><?php echo " <a href=\"supprimer.php?id=$idc & idp=$res[id_produit] & Login=$_GET[Login]\" onClick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')\"><i class=\"fas fa-trash\" style=\"color: #073944\"></i> Supprimer</a>";?></td>
			</tr>		
			<?php 
					$prix_total += $res['Prix_produit'];
				} 
			?>
		</table>
		<div class="checkout"><i class="fa-solid fa-wallet"></i> Prix Total: <?php echo $prix_total ?> DHs</div>
		<a href="cmd.php?action=cmd&id=<?php echo $_GET['id']?>&Login=<?php echo $_GET['Login'] ?>"><input type="submit" name="confirm_cmd" value="Confirmer" class="gestion-btn" style="width: 150px"></a>
	</section>
</div>
<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require_once("Layout_standard.php"); ?>