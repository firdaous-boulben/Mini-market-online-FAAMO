<?php
ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
    <div class="container login">
        <div id="side2" class="signup_admin">
            <h3>Connectez-vous</h3>
            <div class="inp">
                <form action="../controllers/controller_conn.php" method="post">
                    <input name="email" type="text" placeholder="Login" required>
                    <input name="password" type="password" placeholder="Mot de passe" required>
                    <select name="check" required>
                        <option disabled selected>Sélectionner le rôle...</option>
                        <option value="admin" >Administrateur</option>
                        <option value="client">Client</option>
                    </select>
                    <input id="login" name="submit" type="submit" value="Se Connecter">
                </form>
                <div id="message"><?php if (isset($message)) { echo $message; } ?></div>
            </div>
        </div>    
    </div>

    <?php $content = ob_get_clean();      //on récupère le contenu généré avecob_get_clean()?>
    <?php require('Layout_admin.php');