<?php ob_start();           //qui "mémorise" toute la sortie HTML qui suit ?>
<!-- Profil -->
<div id="profil_admin">
<div class="container profil_admin">
  <div class="row">
  <div class="col-md-4" id="side1">	
      <img src="../images/p1.png" alt="user" width="100">
      <h4>Firdaous Boulben</h4>
      <h5>Administrateur</h5>
    </div>
    <div class="col-md-8" id="side2">
      <div class="info">
        <h3>Informations</h3>
        <ul>
          <li><span>ID:</span>&nbsp;&nbsp;1</li>
          <li><span>Email:</span>&nbsp;&nbsp;f.boulben10@gmail.com</li>
          <li><span>Mot de passe:</span>&nbsp;&nbsp;FAAMO1</li>
        </ul>
      </div>
      <div class="social_media">
        <h3>Réseaux sociaux</h3>
        <ul>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Profil -->
<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require('Layout_admin.php');?>