<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
<!-- gestion de stock -->
<?php

$db=new PDO ('mysql:host=localhost;dbname=faamo_database;charset=utf8', 'root', '');
@include '../database/config.php';

if(isset($_POST['add_product'])){
   $p_nom = $_POST['p_nom'];
   $p_nom1 =str_replace("'","\'",$p_nom);
   $p_desc = $_POST['p_desc'];
   $p_desc1 =str_replace("'","\'",$p_desc);
   $p_prix = $_POST['p_prix'];
   $p_cat = $_POST['p_cat'];
   $p_image = file_get_contents($_FILES['p_image']['name']);
   $p_image_tmp_nom = $_FILES['p_image']['tmp_name'];

   $insert_query = $db->prepare("INSERT INTO `produits`(Nom_produit, Desc_produit, Prix_produit, Num_categ, Bin) VALUES('$p_nom1', '$p_desc1', '$p_prix', '$p_cat',  ? )") or die('query failed');
   $row= $insert_query->execute(array(file_get_contents ( $p_image_tmp_nom)));
   if($row){
      $message[] = 'Produit ajouté avec succès.';
   }else{
      $message[] = 'Impossible d\'ajouter le produit.';
   }
};

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `produits` WHERE id_produit = $delete_id ") or die('query failed');
    if($delete_query){
       header('location:stock.php');
       $message[] = 'Produit supprimé avec succès.';
    }else{
       header('location:stock.php');
       $message[] = 'Impossible de supprimer le produit.';
    };
 };

 if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_nom = $_POST['update_p_nom'];
    $update_p_desc = $_POST['update_p_desc'];
    $update_p_prix = $_POST['update_p_prix'];
    $update_p_cat = $_POST['update_p_cat'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_nom = $_FILES['update_p_image']['tmp_name'];
 
    $update_query = mysqli_query($conn, "UPDATE `produits` SET Nom_produit = '$update_p_nom', Desc_produit = '$update_p_desc', Prix_produit = '$update_p_prix', Num_categ = '$update_p_cat', Bin = '$update_p_image' WHERE id_produit = '$update_p_id'");
 
    if($update_query){
       move_uploaded_file($update_p_image_tmp_nom, $update_p_image_dossier);
       $message[] = 'Produit modifié avec succès.';
       header('location:stock.php');
    }else{
       $message[] = 'Impossible de modifier le produit.';
       header('location:stock.php');
    }
 }
?>
<div class="container text-center" id="gestion">
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
            };
        };
    ?>
    <h1>Gestion de stock</h1>
    <a href="#add"><i class="fa fa-cart-plus" style="color: #073944; font-size: 24px"></i></a>
    <section id="display">
        <table id="stock">
            <thead>
                <th>Produit</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `produits`");
                        if(mysqli_num_rows($select_products) > 0){
                            while($row = mysqli_fetch_assoc($select_products)){
                ?>
                <tr>
                    <td><?php  echo '<img height="125px" src="data:image/png;base64,'.base64_encode($row["Bin"]).'"/>';?></td>
                    <td><?php echo $row['Nom_produit']; ?></td>
                    <td><?php echo $row['Desc_produit']; ?></td>
                    <td><?php echo $row['Prix_produit']; ?> Dhs</td>
                    <td><?php echo $row['Num_categ']; ?></td>
                    <td>
                        <a href="stock.php?delete=<?php echo $row['id_produit']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');"> <i class="fas fa-trash" style="color: #073944"></i></a>
                        &nbsp; &nbsp;
                        <a href="stock.php?edit=<?php echo $row['id_produit']; ?>"> <i class="fas fa-edit" style="color: #073944"></i></a>
                    </td>
                </tr>
                <?php
                    };    
                        }else{
                            echo "<div class='empty'>Aucun produit ajouté.</div>";
                        };
                ?>
            </tbody>
        </table>
    </section>
    <section id="edit">
        <?php
            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `produits` WHERE id_produit = $edit_id");
                if(mysqli_num_rows($edit_query) > 0){
                    while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Modifier le produit</h2>
            <?php  echo '<img height="100px" src="data:image/png;base64,'.base64_encode($fetch_edit["Bin"]).'"/>';?>
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id_produit']; ?>">
            <input type="text" class="form-control" required name="update_p_nom" value="<?php echo $fetch_edit['Nom_produit']; ?>">
            <input type="text" class="form-control" required name="update_p_desc" value="<?php echo $fetch_edit['Desc_produit']; ?>">
            <input type="text" class="form-control" required name="update_p_prix" value="<?php echo $fetch_edit['Prix_produit']; ?>">
            <input type="text" class="form-control" required name="update_p_cat" value="<?php echo $fetch_edit['Num_categ']; ?>">
            <input type="file" class="form-control" required name="update_p_image" accept="image/png, image/jpg">
            <input type="submit" class="gestion-btn" name="update_product" value="Modifier" style="width: 200px;">
            <input type="reset" class="gestion-btn" id="close-edit" value="Annuler" style="width: 200px;">
        </form>
        <?php
            };
            };
            echo "<script>document.querySelector('#edit').style.display = 'flex';</script>";
            };
        ?>
        <script>
            document.querySelector('#close-edit').onclick = () =>{
                document.querySelector('#edit').style.display = 'none';
                window.location.href = 'stock.php';
            };
        </script>
    </section>
    <section id="add">
        <h2 style="margin-top: 50px;">Ajouter un produit</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="p_nom" class="form-control" placeholder="Nom du produit" required>
            <input type="text" name="p_desc" placeholder="Description du produit" class="form-control" required>
            <input type="text" name="p_prix" placeholder="Prix du produit" class="form-control" required>
            <select name="p_cat" class="form-control">
                <option disabled selected>Catégorie</option>
                <option value="1">Épicerie</option>
                <option value="2">Biscuits, Snacking</option>
                <option value="3">Produits laitiers</option>
                <option value="4">Eaux, boissons</option>
            </select>
            <input type="file" name="p_image" class="form-control" required>
            <input type="submit" class="gestion-btn" name="add_product" value="ajouter" style="width: 200px;">
        </form>
    </section>
</div>

<!-- gestion de stock -->
<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require('Layout_admin.php');