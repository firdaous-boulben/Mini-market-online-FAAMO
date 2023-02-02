<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
     <!-- home content -->
     <section class="home">
            <div class="content">
                <h3>FAAMO Market</br><span>Au-delà de vos attentes!</span></h3>
                <div class="underline"></div>
                <?php if(isset($_GET["Login"]))  {?>
                  <p> Bonjour <?php echo $_GET["Login"]; $id=$_GET["id"];  ?>!</p>
                <?php }?>
                <p>Vous n'êtes plus besoin de vous déplacer, retrouvez tout ce qu'il vous faut au quotidien aux meilleurs prix d'une qualité exceptionnelle.</p>
            </div>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #39A2DB;"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: #39A2DB;"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" style="background-color: #39A2DB;"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4" style="background-color: #39A2DB;"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Cat1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <h5>Épicerie</h5>
                      <a href="catalogue_par_categorie.php?Login=<?php if(isset($_GET["Login"])) echo $_GET["Login"];?>&id=<?php if(isset($_GET["id"])) echo $_GET["id"];?>"><button id="buynow">Achetez Maintenant</button></a>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Cat2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <h5>Biscuits, Snacking</h5>
                      <a href="catalogue_par_categorie.php?Login=<?php if(isset($_GET["Login"])) echo $_GET["Login"];?>&id=<?php if(isset($_GET["id"])) echo $_GET["id"];?>"><button id="buynow">Achetez Maintenant</button></a>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Cat3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <h5>Produits laitiers</h5>
                      <a href="catalogue_par_categorie.php?Login=<?php if(isset($_GET["Login"])) echo $_GET["Login"];?>&id=<?php if(isset($_GET["id"])) echo $_GET["id"];?>"><button id="buynow">Achetez Maintenant</button></a>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Cat4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <h5>Eaux, boissons</h5>
                      <a href="catalogue_par_categorie.php?Login=<?php if(isset($_GET["Login"])) echo $_GET["Login"];?>&id=<?php if(isset($_GET["id"])) echo $_GET["id"];?>"><button id="buynow">Achetez Maintenant</button></a>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                  <span><i class="fa fa-angle-left fa-2x" aria-hidden="true" style="color: #39A2DB;"></i></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                  <span><i class="fa fa-angle-right fa-2x" aria-hidden="true" style="color: #39A2DB;"></i></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </section>
        <!-- home content -->
    </div>

    <!-- banner -->
    <div class="banner">
        <div class="content">
            <h1>Obtenez jusqu'à 50% de réduction</h1>
            <p>Des réductions comme vous n'en avez jamais vues chez FAAMO Market!</p>
            <div id="bannerbtn"><a href="promos.php?Login=<?php if(isset($_GET["Login"])) echo $_GET["Login"];?>&id=<?php if(isset($_GET["id"])) echo $_GET["id"];?>"><button>Explorez Maintenant</button></a></div>
        </div>
    </div>
    <!-- banner -->

    <!-- offer -->
    <div class="container" id="offer">
        <div class="row">
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-cart-shopping"></i>
                <h5>Livraison Gratuite</h5>
                <p>sur commande à partir de 100 Dhs</p>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-truck"></i>
                <h5>Livraison Rapide</h5>
                <p>partout au Maroc</p>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-thumbs-up"></i>
                <h5>Qualité</h5>
                <p>Produits avec meilleure qualité</p>
            </div>
        </div>
    </div>
    <?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
    <?php require('Layout_standard.php');