<?php
    require_once("cone.php");
    $req="SELECT * from  categories";
    $res=mysqli_query($db,$req);
?>
 
<select id="cats" style="
    width: 30%;
    height: 30px;
    outline: none;
    display: block;
    margin: 30px auto;
">
    <option value="0">Toutes les catégories</option>
    <?php 
        while($cat=mysqli_fetch_assoc($res)){ ?>
        <option value="<?php  echo($cat["Num_categ"]) ?>"><?php echo($cat["Nom_categ"]) ?> </option>
    <?php }?>
</select>