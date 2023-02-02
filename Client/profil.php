<?php
    require("../controllers/model/model.php");
    $idc=$_GET["id"];
    $req=afficher_client($idc);
    require("profil_client.php");
?>