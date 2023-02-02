<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
<!-- boîte de reception -->
<?php

@include '../database/config.php';

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `messages` WHERE id = $delete_id ") or die('query failed');
    if($delete_query){
       header('location:inbox.php');
       $message[] = 'Message supprimé avec succès.';
    }else{
       header('location:inbox.php');
       $message[] = 'Impossible de supprimer le message.';
    };
 };
?>
<div class="container text-center" id="gestion">
    <h1>Boîte de réception</h1>
    <section id="inbox">
		<table>
            <tbody>
            <?php
                $select_messages = mysqli_query($conn, "SELECT * FROM `messages`");
                if(mysqli_num_rows($select_messages) > 0){
                    while($row = mysqli_fetch_assoc($select_messages)){
            ?>
            <tr>
		        <td width="35%">
                    <dl>
                        <dt>Message de :</br></dt>
                        <dd><i class="fa-solid fa-user"></i>&nbsp;<?php echo $row['Nom_complet']; ?></dd>
                        <dd><i class="fa-solid fa-globe"></i>&nbsp;<?php echo $row['Email']; ?></dd>
                        <dd><i class="fa-solid fa-phone"></i>&nbsp;<?php echo $row['Telephone']; ?></dd>
                    <dl>
                </td>
                <td width="55%">
                    <span><?php echo $row['Sujet']; ?></span><br/>
                    <?php echo $row['Msg']; ?>
                </td>
                <td width="10%">
                    <button class="markbtn" onclick="mark(this)"><i class="fa-regular fa-bookmark"></i></button>
                    &nbsp; &nbsp;
                    <a href="inbox.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');"> <i class="fas fa-trash" style="color: #073944"></i></a>
                </td>
            </tr>
            <?php
                };    
                }else{
                    echo "<img src='../images/inbox.png' height='200px'>";
                    echo "<div class='empty'>Votre boîte de réception est vide.</div>";
                };
            ?>
            </tbody>
        </table>
        
        <script>
            function mark(e){
                var markbtn = e.children[0];
                markbtn.classList.toggle('fa-solid');
                if (markbtn.classList.contains('fa-solid')) {
                    markbtn.style.color = "#073944";
                }
            }
        </script>
    </section>
</div>

<!-- boîte de reception -->
<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require('Layout_admin.php');