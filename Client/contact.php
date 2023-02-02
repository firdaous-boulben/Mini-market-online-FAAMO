<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
<!-- contact -->
<?php
@include '../database/config.php';

if(isset($_POST['send_msg'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $sujet = $_POST['sujet'];
    $msg = $_POST['msg'];
    $msg1 =str_replace("'","\'",$msg);

    $insert_query = mysqli_query($conn, "INSERT INTO `messages`(Nom_complet, Email, Telephone, Sujet, Msg) VALUES('$nom', '$email', '$tel', '$sujet', '$msg1')") or die('query failed');

    if($insert_query){
        $message[] = 'Votre message a été envoyé avec succès !';
    }else{
        $message[] = 'Échec de l\'envoi du message.';
    }
};
?>
    <div class="container" id="contact">
        <h1 class="text-center">Contactez-nous</h1>
        <div id="contact-details">
            <div id="contact-infos">
                <h2>Contact infos</h2>
                <div class="underline"></div>
                <div class="card">
                    <i class="fas fa-phone"> Telephone</i>
                    <h6>0539XXXXXX</h6>
                </div>
                <div class="card">
                    <i class="fa-solid fa-envelope"> Email</i>
                    <h6>faamo.market@gmail.com</h6>
                </div>
                <div class="card">
                    <i class="fa-solid fa-location-dot"> Adresse</i>
                    <h6>Ancienne Route de l'Aéroport, Km 10 Ziaten BP: 416 Tanger, Maroc.</h6>
                </div>
            </div>
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.610201955227!2d-5.89700648539316!3d35.73580393458575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b87d71f995045%3A0xc35a87c33b565280!2sFacult%C3%A9%20des%20sciences%20et%20techniques%20de%20Tanger!5e0!3m2!1sfr!2sma!4v1673874827198!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div>
            <h2>Envoyez un message</h2>
            <div class="underline" style="width: 5%;"></div>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
                    };
                };
            ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4 py-3 py-md-0">
                    <input type="text" class="form-control" name="nom" placeholder="Nom Complet" required>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="tel" class="form-control" name="tel" placeholder="Téléphone" pattern="[0-9]{10}" required>
                </div>
                <div style="margin-top: 30px;">
                    <select class="form-control" name="sujet" required>
                        <option disabled selected>Sélectionnez un sujet...</option>
                        <option>Suivre une commande</option>
                        <option>Signaler un problème</option>
                        <option>Retourner une commande</option>
                        <option>Annuler une commande</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div class="form-group" style="margin-top: 30px;">
                    <textarea class="form-control" name="msg" rows="5" placeholder="Message"></textarea>
                </div>
                <input type="submit" id="messagebtn" name="send_msg" value="Envoyer"/>
            </div>
        </form>
    </div>
<!-- contact -->
<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require('Layout_standard.php');