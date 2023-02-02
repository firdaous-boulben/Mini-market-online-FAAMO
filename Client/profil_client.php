<?php ob_start();           //qui "mémorise" toute la sortie HTML qui suit ?>
<!-- Profil -->
<div id="profil_admin">
<div class="container profil_admin">
  <div class="row">
  <div class="col-md-4" id="side1">
  <?php
				while($res = $req->fetch()) {	
			?>	
      <img src="../images/compte.png" alt="user" width="100">
      <h4><?php echo $_GET["Login"]."  ", $res['Nom']?></h4>
      <h5>Client(e)</h5>
    </div>
    <div class="col-md-8" id="side2">
      <div class="info">
        <h3>Informations</h3>
        <ul>
          <li><span>ID:</span>&nbsp;&nbsp;<?=$_GET["id"] ?></li>
          <li><span>Adresse:</span>&nbsp;&nbsp;<?php echo $res['Adresse'] ?></li>
          <li><span>Téléphone:</span>&nbsp;&nbsp;<?php echo $res['Telephone'] ?></li>
          <li><span>Email:</span>&nbsp;&nbsp;<?php echo $res['Email'] ?></li>
          <li><span>Mot de passe:</span>&nbsp;&nbsp;<?php echo $res['Mot_de_passe'] ?></li>
        </ul>
      </div>
      <?php 
				} 
			?>
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
<?php require('Layout_standard.php');?>