<?php
    require("../controllers/model/model.php");
    $idc=$_GET["id"];
    $req=afficher_panier($idc);
    require("cart.php");
?>