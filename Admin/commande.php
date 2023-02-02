<?php ob_start();         //qui "mémorise" toute la sortie HTML qui suit ?>

<?php
    @include '../database/config.php';
    $idc=$_GET['idc'];

    $sql="SELECT * FROM produits INNER JOIN panier WHERE produits.id_produit=panier.id_produit AND panier.id_client=$idc";
    $sql1="SELECT * FROM clients WHERE id_client=$idc";
    $sql2="SELECT * FROM panier WHERE id_client=$idc";
    $result2=mysqli_query($conn,$sql2);
    $result=mysqli_query($conn,$sql);
    $result1=mysqli_query($conn,$sql1);
    $res1 = mysqli_fetch_array($result1);
    $prix=0;
    while($res = mysqli_fetch_array($result)) {
        $prix=$prix+$res['Prix_produit'];
    }	
?>

<div class="container text-center" id="gestion">
    <h1>Gestion de commandes</h1>
    <section id="display">
        <table>
            <thead>
                <th>Nom</th>  
                <th>Prénom</th>                             
                <th>N°Prouduits</th>
                <th>Prix total</th>        
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $res1['Nom'];?></td>
                    <td><?php echo $res1['Prenom'];?></td>
                    <td><?php echo mysqli_num_rows($result2)?></td>
                    <td><?php echo $prix;?> DH</td>                           
                </tr>
            </tbody>
        </table>
    </section>
</div>
<?php $content = ob_get_clean();      //on récupère le contenu généré avecob_get_clean()?>
<?php require_once("Layout_admin.php"); ?>







