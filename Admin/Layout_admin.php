<!DOCTYPE html>
<html lang="en">

<?php

@include '../database/config.php';

if(isset($_POST['signup_news'])){
   $email = $_POST['email'];
   $insert_query = mysqli_query($conn, "INSERT INTO `abonnes`(Email) VALUES('$email')") or die('query failed');
   if($insert_query){
      $message[] = 'Merci de vous être abonné.';
   }else{
      $message[] = 'Erreur lors de l\'abonnement.';
   }
};
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAAMO Market</title>
    <link rel="shortcut icon" type="image" href="../images/FAAMO-icon.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.google.com/specimen/Outfit/about?query=outfit" rel="stylesheet">
</head>
<body>
    <!-- top navbar -->
    <div class="top-navbar">
        <div class="top-icons">
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
        <div class="other-links">
            <button id="btn-logout"><a href="../Client/connexion.php">Se Deconnecter</a></button>
            <a href="profil_admin.php"><i id="admin" class="fa-solid fa-user"></i></a>
        </div>
    </div>
    <!-- top navbar -->
    <div class="home-section">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="accueil_admin.php" id="brand"><img src="../images/FAAMO-logo.png" alt="Logo" width="150px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="accueil_admin.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stock.php">Gestion de stock</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clients.php">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commandes.php">Commandes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inbox.php">Boîte de réception</a>
                        </li>
                    </ul>               
                </div>
            </div>
        </nav>
        <!-- navbar -->

    <?= $content ?>

    <!-- footer -->
    <footer id="footer" style="margin-top: 50px;">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Nous contacter</h4>
                    <span><i class="fas fa-phone"></i> Téléphone:  0539XXXXXX</span><br>
                    <span><i class="fa-solid fa-envelope"></i> Email:  faamo.market@gmail.com</span><br>
                    <span><i class="fa-solid fa-location-dot"></i> Adresse:  BP: 416 Tanger, Maroc.</span>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Liens Rapides</h4>
                    <ul>
                        <li><a href="accueil_admin.php">Accueil</a></li>
                        <li><a href="stock.php">Gestion de stock</a></li>
                        <li><a href="clients.php">Clients</a></li>
                        <li><a href="commandes.php">Commandes</a></li>
                        <li><a href="inbox.php">Boîte de réception</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Nous suivre</h4>
                    <p>Pour rester informé des prochaines promo et offres spéciales.</p>
                    <div class="socail-links mt-3">
                        <a href="#" class="twiiter"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="twiiter"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="twiiter"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Newsletter</h4>
                    <p>En Avant Première les Top nouveautés & Promos !</p>
                    <?php
                        if(isset($message)){
                            foreach($message as $message){
                                echo '<div class="message_abon"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
                            };
                        };
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input class="form-control" type="text" name="email" placeholder="Votre email" required>
                        <input type="submit" name="signup_news" value="S'inscrire">
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="container py-4">
            <div class="copyright">FAAMO Market &copy; Copyright 2023. Tous droits réservés.</div>
        </div>
    </footer>
    <!-- footer -->

    <a href="#" class="arrow"><i class="fa fa-arrow-circle-up fa-3x"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>