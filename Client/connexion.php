<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
<div class="container login">
        <div class="row">
            <div class="col-md-4" id="side1">
                <h2>Content de te revoir!</h2>
                <p>Voulez-vous créer un nouveau compte ?</p>
                <div id="btn"><a href="inscription.php">S'inscrire</a></div>
            </div>
            <div class="col-md-8" id="side2">
                <h3>Connectez-vous</h3>
                <div class="inp">
                    <form action="../controllers/controller_conn.php" method="POST">
                        <input type="email" name="email" placeholder="Login" required>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                        <select name="check" required>
                            <option disabled selected>Sélectionner le rôle</option>
                            <option value="admin">Administrateur</option>
                            <option value="client">Client</option>
                        </select>
                        <input id="login" name="submit" type="submit" value="Se Connecter">
                    </form>
                    <div id="message"><?php if (isset($message)) { echo $message; } ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- login -->
    <?php $content = ob_get_clean();      //on récupère le contenu généré avecob_get_clean()?>
    <?php require('Layout_standard.php');