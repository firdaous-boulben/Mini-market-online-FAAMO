<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
<!-- gestion des clients -->
<?php

@include '../database/config.php';

if(isset($_POST['add_client'])){
   $c_nom = $_POST['c_nom'];
   $c_prenom = $_POST['c_prenom'];
   $c_tele = $_POST['c_tele'];
   $c_adresse = $_POST['c_adresse'];
   $c_email = $_POST['c_email'];
   $c_mdp = $_POST['c_mdp'];

   $insert_query = mysqli_query($conn, "INSERT INTO `clients`(Nom, Prenom, Telephone, Adresse, Email, Mot_de_passe) VALUES('$c_nom', '$c_prenom', '$c_tele', '$c_adresse', '$c_email', '$c_mdp')") or die('query failed');

   if($insert_query){
      $message[] = 'Client ajouté avec succès.';
   }else{
      $message[] = 'Impossible d\'ajouter le client.';
   }
};

if(isset($_GET['delete'])){
    $delete_c_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `clients` WHERE `clients`.`id_client` = $delete_c_id ") or die('query failed');
    if($delete_query){
       header('location:clients.php');
       $message[] = 'Client supprimé avec succès.';
    }else{
       header('location:clients.php');
       $message[] = 'Impossible de supprimer le client.';
    };
 };

 if(isset($_POST['update_client'])){
    $update_c_id = $_POST['update_c_id'];
    $update_c_nom = $_POST['update_c_nom'];
    $update_c_prenom = $_POST['update_c_prenom'];
    $update_c_tele = $_POST['update_c_tele'];
    $update_c_adresse = $_POST['update_c_adresse'];
    $update_c_email = $_POST['update_c_email'];
    $update_c_mdp = $_POST['update_c_mdp'];
 
    $update_query = mysqli_query($conn, "UPDATE `clients` SET Nom = '$update_c_nom', Prenom = '$update_c_prenom', Telephone = '$update_c_tele', Adresse = '$update_c_adresse', Email = '$update_c_email', Mot_de_passe = '$update_c_mdp' WHERE id_client = '$update_c_id'");
 
    if($update_query){
       $message[] = 'Client modifié avec succès.';
       header('location:clients.php');
    }else{
       $message[] = 'Impossible de modifier le client.';
       header('location:clients.php');
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
    <h1>Gestion des clients</h1>
    <a href="#add"><i class="fa fa-user-plus" style="color: #073944; font-size: 20px"></i></a>
    <section id="display">
        <table id="clients">
            <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                    $select_clients = mysqli_query($conn, "SELECT * FROM `clients`");
                        if(mysqli_num_rows($select_clients) > 0){
                            while($row = mysqli_fetch_assoc($select_clients)){
                ?>
                <tr>
                    <td><?php echo $row['Nom']; ?></td>
                    <td><?php echo $row['Prenom']; ?></td>
                    <td><?php echo $row['Telephone']; ?></td>
                    <td><?php echo $row['Adresse']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Mot_de_passe']; ?></td>
                    <td>
                        <a href="clients.php?delete=<?php echo $row['id_client']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');"> <i class="fas fa-trash" style="color: #073944"></i></a>
                        &nbsp; &nbsp;
                        <a href="clients.php?edit=<?php echo $row['id_client']; ?>"> <i class="fas fa-edit" style="color: #073944"></i></a>
                    </td>
                </tr>
                <?php
                    };    
                        }else{
                            echo "<div class='empty'>Aucun client ajouté.</div>";
                        };
                ?>
            </tbody>
        </table>
    </section>
    <section id="edit">
        <?php
            if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `clients` WHERE id_client = $edit_id");
                if(mysqli_num_rows($edit_query) > 0){
                    while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Modifier le client</h2>
            <input type="hidden" name="update_c_id" value="<?php echo $fetch_edit['id_client']; ?>">
            <input type="text" class="form-control" required name="update_c_nom" value="<?php echo $fetch_edit['Nom']; ?>">
            <input type="text" class="form-control" required name="update_c_prenom" value="<?php echo $fetch_edit['Prenom']; ?>">
            <input type="text" class="form-control" required name="update_c_tele" value="<?php echo $fetch_edit['Telephone']; ?>">
            <input type="text" class="form-control" required name="update_c_adresse" value="<?php echo $fetch_edit['Adresse']; ?>">
            <input type="text" class="form-control" required name="update_c_email" value="<?php echo $fetch_edit['Email']; ?>">
            <input type="text" class="form-control" required name="update_c_mdp" value="<?php echo $fetch_edit['Mot_de_passe']; ?>">
            <input type="submit" class="gestion-btn" name="update_client" value="Modifier" style="width: 200px;">
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
                window.location.href = 'clients.php';
            };
        </script>
    </section>
    <section id="add">
        <h2 style="margin-top: 50px;">Ajouter un client</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="c_nom" class="form-control" placeholder="Nom du client" required>
            <input type="text" name="c_prenom" class="form-control" placeholder="Prénom du client" required>
            <input type="text" name="c_tele" placeholder="Téléphone du client" class="form-control" required>
            <input type="text" name="c_adresse" placeholder="Adresse du client" class="form-control" required>
            <input type="email" name="c_email" placeholder="Email du client" class="form-control" required>
            <input type="password" name="c_mdp" placeholder="Mot de passe du client" class="form-control" required>
            <input type="submit" class="gestion-btn" name="add_client" value="ajouter" style="width: 200px;">
        </form>
    </section>
</div>

<!-- gestion des clients -->
<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require('Layout_admin.php');