<?php 
    $id= $_GET['id'];
    while($row=$All->fetch()){
?>

<div id="client"> </div>
<div class="container" >
        <div class="container" id="product-cards">
            <div class="row">
                <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                    <a href="../controllers/remplir1.php?action=fav&id=<?php echo $row["id_produit"]?> & id=<?php echo $id;?>  "> <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button></a>
                       <?php  echo '<img src="data:image/png;base64,'.base64_encode($row["Bin"]).'" />';?>
                        <div class="card-body">
                            <h4><?php echo $row["Nom_produit"] ?></h4>
                            <p><?php echo $row["Desc_produit"] ?></p>
                            <div class="star text-center">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5 class="text-center"><?php echo $row["Prix_produit"]." DHs" ?></h5>
                            <div class="qtybox">
                                <div class="dec qtybtn">-</div>
                                <input type="text" name="qty" id="1" value="1" readonly>
                                <div class="inc qtybtn">+</div>
                            </div>
                            <a href="../controllers/remplir1.php?action=panier&idp=<?php echo $row["id_produit"]?> & id=<?php echo $_GET["id"];?> & Login=<?php echo $_GET["Login"];?>">
                                <button name="submit" class="addtocart">Ajouter au panier</button>
                            </a>
                        </div>
                    </div>
                    </div>

                    <?php $row=$All->fetch() ?>
                    <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                        <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button>
                       <?php  echo '<img src="data:image/png;base64,'.base64_encode($row["Bin"]).'" />';?>
                        <div class="card-body">
                            <h4><?php echo $row["Nom_produit"] ?></h4>
                            <p><?php echo $row["Desc_produit"] ?></p>
                            <div class="star text-center">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5 class="text-center"><?php echo $row["Prix_produit"]." DHs" ?></h5>
                            <div class="qtybox">
                                <div class="dec qtybtn">-</div>
                                <input type="text" name="qty" id="1" value="1" readonly>
                                <div class="inc qtybtn">+</div>
                            </div>
                            <a href="../controllers/remplir1.php?action=panier&idp=<?php echo $row["id_produit"]?> & id=<?php echo $_GET["id"];?> & Login=<?php echo $_GET["Login"];?>">
                                <button name="submit" class="addtocart">Ajouter au panier</button>
                            </a>                     
                        </div>
                    </div>
                    </div>

                    <?php $row=$All->fetch()?>
                    <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                        <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button>
                       <?php  echo '<img src="data:image/png;base64,'.base64_encode($row["Bin"]).'"/>';?>
                        <div class="card-body">
                            <h4><?php echo $row["Nom_produit"] ?></h4>
                            <p><?php echo $row["Desc_produit"] ?></p>
                            <div class="star text-center">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5 class="text-center"><?php echo $row["Prix_produit"]." DHs" ?></h5>
                            <div class="qtybox">
                                <div class="dec qtybtn">-</div>
                                <input type="text" name="qty" id="1" value="1" readonly>
                                <div class="inc qtybtn">+</div>
                            </div>
                            <a href="../controllers/remplir1.php?action=panier&idp=<?php echo $row["id_produit"]?> & id=<?php echo $_GET["id"];?>  & Login=<?php echo $_GET["Login"];?>">
                                <button name="submit" class="addtocart">Ajouter au panier</button>
                            </a>                     
                        </div>
                    </div>
                    </div>

                    <?php $row=$All->fetch() ?>
                    <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                        <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button>
                       <?php  echo '<img src="data:image/png;base64,'.base64_encode($row["Bin"]).'" />';?>
                        <div class="card-body">
                            <h4><?php echo $row["Nom_produit"] ?></h4>
                            <p><?php echo $row["Desc_produit"] ?></p>
                            <div class="star text-center">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5 class="text-center"><?php echo $row["Prix_produit"]." DHs" ?></h5>
                            <div class="qtybox">
                                <div class="dec qtybtn">-</div>
                                <input type="text" name="qty" id="1" value="1" readonly>
                                <div class="inc qtybtn">+</div>
                            </div>
                            <a href="../controllers/remplir1.php?action=panier&idp=<?php echo $row["id_produit"]?> & id=<?php echo $_GET["id"];?> & Login=<?php echo $_GET["Login"];?>">
                                <button name="submit" class="addtocart">Ajouter au panier</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
</div> 
<script src="../js/categories.js"></script>
<?php }?>

