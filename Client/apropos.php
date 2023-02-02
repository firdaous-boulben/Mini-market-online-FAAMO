<?php ob_start();            //qui "mémorise" toute la sortie HTML qui suit ?>
 <!-- a propos -->
 <div class="container" id="apropos">
        <h1>Nous-connaître</h1>
        <div class="text-center"></div>
        <div style="margin-top: 50px;">
            <h2>Notre Entreprise</h2>
            <div class="underline" style="width: 5%;"></div>
            <p id="apropos-content">
                FAAMO Market est un supermarché en ligne qui dispose d'un large choix de produits de différentes catégories pour répondre à vos besoins.
                <br>
                Avec notre mini-market en ligne, vous n'avez plus besoin de pousser un chariot lourd et prendre la queue devant une caisse plein du monde. Faite vos courses de chez vous en toute légèreté et avec une qualité exceptionnelle et le prix le plus optimal.
                <br><br>
                FAAMO Market vous garantit :
            </p>
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
            <!-- offer -->
        </div>
        <div style="margin-top: 50px;">
            <h2>Notre Équipe</h2>
            <div class="underline" style="width: 5%;"></div>
            <div class="row" id="profile-cards">
                <div class="col profile">
                    <div class="card_inner">
                        <div class="card_face card_face--front"><h3>F</h3></div>
                        <div class="card_face card_face--back">
                            <div class="card_content">
                                <img src="../images/p1.png" />
                                <h3>Firdaous Boulben</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col profile">
                    <div class="card_inner">
                        <div class="card_face card_face--front"><h3>A</h3></div>
                        <div class="card_face card_face--back">
                            <div class="card_content">
                                <img src="../images/p2.jpg" />
                                <h3>Abderrazzak El Bourkadi</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col profile">
                    <div class="card_inner">
                        <div class="card_face card_face--front"><h3>A</h3></div>
                        <div class="card_face card_face--back">
                            <div class="card_content">
                                <img src="../images/p3.jpg" />
                                <h3>Ayoub Et-Toubi</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col profile">
                    <div class="card_inner">
                        <div class="card_face card_face--front"><h3>M</h3></div>
                        <div class="card_face card_face--back">
                            <div class="card_content">
                                <img src="../images/p4.png" />
                                <h3>Mohamed El Mrabet</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col profile">
                    <div class="card_inner">
                        <div class="card_face card_face--front"><h3>O</h3></div>
                        <div class="card_face card_face--back">
                            <div class="card_content">
                                <img src="../images/p5.jpg" />
                                <h3>Ouassim Assoufi</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
        const container = document.querySelector('#profile-cards');
        const cards = container.querySelectorAll('.card_inner');
        Array.from(cards).forEach(function(card){
            card.addEventListener('click', function (e) {
                card.classList.toggle('is-flipped');
            });
        });
        </script>
        </div>
    </div>
    <!-- a propos -->
    <?php $content = ob_get_clean();      //on récupère le contenu généré avec ob_get_clean()?>
    <?php require('Layout_standard.php');