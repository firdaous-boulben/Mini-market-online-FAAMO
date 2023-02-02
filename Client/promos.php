<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
    <!-- promos -->
    <div class="container" id="promos">
        <h1 class="text-center">Promotions</h1>
        <p class="text-center">Des réductions comme vous n'en avez jamais vues chez FAAMO Market!</p>
        <div class="container" id="product-cards">
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                        <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button>
                        <img src="../images/CocaCola.png" alt="Pack de Coca-cola">
                        <div class="card-body">
                            <h4>Pack de Coca-cola</h4>
                            <p>Pack de 4 boissons gazeuses Coca cola 1Lx4<br><a href="categorie4.html">Eaux, boissons</a></p>
                            <div class="star">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5><strike>31.90 Dhs</strike> 26.95 Dhs <span><i class="fa-solid fa-cart-shopping"></i></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                        <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button>
                        <img src="../images/MayMouna.png" alt="Farine MayMouna">
                        <div class="card-body">
                            <h4>Farine MayMouna</h4>
                            <p>Farine fleur de blé tendre MayMouna 10kg<br><a href="categorie1.html">Épicerie</a></p>
                            <div class="star">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5><strike>63.50 Dhs</strike> 49.95 Dhs <span><i class="fa-solid fa-cart-shopping"></i></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                        <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button>
                        <img src="../images/QualityStreet.png" alt="Quality Street">
                        <div class="card-body">
                            <h4>Quality Street</h4>
                            <p>Boîte de chocolats Quality Street 850g - MACKINTOSH'S<br><a href="categorie2.html">Biscuits, Snacking</a></p>
                            <div class="star">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5><strike>273.50 Dhs</strike> 219.95 Dhs <span><i class="fa-solid fa-cart-shopping"></i></span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 py-3 py-md-0">
                    <div class="card">
                        <button class="addtofav" onclick="addtofav(this)"><i class="fa-regular fa-heart"></i></button>
                        <img src="../images/LaitJaouda.png" alt="Pack de lait Jaouda">
                        <div class="card-body">
                            <h4>Pack de lait Jaouda</h4>
                            <p>Pack de 6 lait entier UHT Jaouda 1Lx6<br><a href="categorie3.html">Produits laitiers</a></p>
                            <div class="star">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                            </div>
                            <h5><strike>59.70 Dhs</strike> 52.95 Dhs <span><i class="fa-solid fa-cart-shopping"></i></span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/categories.js"></script>
    </div>
    <!-- promos -->
<?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
<?php require('Layout_standard.php');