<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
 <!-- sign up -->
 <div class="container login">
        <div class="row">
            <div class="col-md-4" id="side1">
                <h2>Bienvenue sur FAAMO Market!</h2>
                <p>Vous avez déjà un compte ?</p>
                <div id="btn"><a href="connexion.php">Se connecter</a></div>
            </div>
            <div class="col-md-8" id="side2">
                <h3>Créez votre compte</h3>
                <div class="inp">
                    <form action="../controllers/remplir1.php?action=inscription"method="POST">
                        <span>
                            <input type="text" name="Nom" placeholder="Nom" required>
                            <input type="text" name="Prenom" placeholder="Prénom" required>
                        </span>
                        <input type="tel" name="Telephone" placeholder="Téléphone" pattern="[0-9]{10}" required>
                        <input type="text" name="Adresse" placeholder="Adresse" required>
                        <input type="email" name="Email" placeholder="Email" required>
                        <input type="password" name="Mot_de_passe" placeholder="Mot de passe" required>
                        <input id="signup" name="submit" type="submit" value="S'inscrire">
                 </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- sign up -->

    <?php $content = ob_get_clean();      //on récupère le contenu généré avecob_get_clean()?>
    <?php require('Layout_standard.php');