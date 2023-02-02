<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
<!-- gestion de commandes -->
<?php

@include '../database/config.php';

if(isset($_GET['delete'])){
    $delete_c_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `commande` WHERE `commande`.`id_commande` = $delete_c_id ") or die('query failed');
    if($delete_query){
       header('location:commandes.php');
       $message[] = 'Commande supprimée avec succès.';
    }else{
       header('location:commandes.php');
       $message[] = 'Impossible de supprimer la commande.';
    };
 };

?>
<div class="container text-center" id="gestion">
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
            };
        };
    ?>
    <h1>Gestion de commandes</h1>
    <section id="display">
        <table>
            <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th colspan="4">Produit</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                    $select_clients = mysqli_query($conn, "SELECT * FROM `clients` INNER JOIN `commande` WHERE clients.id_client=commande.id_client");
                    $select_commandes = mysqli_query($conn, "SELECT * FROM `commande`");
                    $select_produits = mysqli_query($conn, "SELECT * FROM `produits` INNER JOIN `commande` WHERE produits.id_produit=commande.id_prod");
                        if(mysqli_num_rows($select_clients) > 0){
                            while($row_client = mysqli_fetch_assoc($select_clients)){
                ?>
                <tr>
                    <td><?php echo $row_client['Nom']; ?></td>
                    <td><?php echo $row_client['Prenom']; ?></td>
                    <td><?php echo $row_client['Email']; ?></td>
                    <td><?php echo $row_client['Telephone']; ?></td>
                    <td>ID : <?php $row_prd = mysqli_fetch_assoc($select_produits); echo $row_prd['id_produit']; ?></td>
                    <td><?php echo $row_prd['Nom_produit']; ?></td>
                    <td><?php echo '<img height="80px" src="data:image/png;base64,'.base64_encode($row_prd["Bin"]).'"/>';?></td>
                    <td><?php echo $row_prd["Prix_produit"];?> DH</td>
                    <td>
                        <a href="commandes.php?delete=<?php $row = mysqli_fetch_assoc($select_commandes);echo $row['id_commande']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');"> <i class="fas fa-trash" style="color: #073944"></i> Supprimer</a>
                    </td>
                </tr>
                <?php
                    };    
                        }else{
                            echo "<div class='empty'>Aucune commande effectuée.</div>";
                        };
                ?>
            </tbody>
        </table>
    </section>
</div>
<!-- gestion de commandes -->

<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require('Layout_admin.php');?>