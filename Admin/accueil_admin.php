<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
     <!-- home content -->
     <section class="home home_admin">
            <div class="content content_admin">
                <h3>FAAMO Market</br><span>Au-delà de vos attentes!</span></h3>
                <div class="underline"></div>
                <p>Bienvenue sur le portail administrateur, vous pouvez désormais gérer votre stock de FAAMO Market, vos clients et toutes les commandes effectuées.</p>
            </div>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #39A2DB;"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: #39A2DB;"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 2" style="background-color: #39A2DB;"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 2" style="background-color: #39A2DB;"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Clients.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <a href="clients.php"><button id="buynow">Gérez les clients</button></a>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Produits.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <a href="stock.php"><button id="buynow">Gérez les produits</button></a>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Commandes.jpg"  class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <a href="commandes.php"><button id="buynow">Gérez les commandes</button></a>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <div class="image">
                        <img src="../images/Inbox.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div>
                      <a href="inbox.php"><button id="buynow">Boîte de reception</button></a>
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

    <!-- offer -->
    <div class="container" id="offer" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-4 py-3 py-md-0">
              <i class="fa fa-plus" aria-hidden="true"></i>
              <h5>Ajouter</h5>
              <p>Vous avez la possibilité d'ajouter des produits, des clients et des commandes</p>
            </div>
            <div class="col-md-4 py-3 py-md-0">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              <h5>Modifier</h5>
              <p>Facilement vous pouvez modifier les détailles de chaque produit, client, et commande</p>
            </div>
            <div class="col-md-4 py-3 py-md-0">
              <i class="fa fa-trash" aria-hidden="true"></i>
              <h5>Supprimer</h5>
              <p>Vous pouvez supprimer des produits, des clients ou des commandes</p>
            </div>
        </div>
    </div>
    <?php $content = ob_get_clean();
          //on récupère le contenu généré avecob_get_clean()?>
    <?php require('Layout_admin.php');