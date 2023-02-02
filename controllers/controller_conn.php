<?php
require_once 'model_conn.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check = $_POST['check'];
    if($check == "admin"){
        $user = login_admin($email, $password);
        if($user) {
           header('location: ../Admin/accueil_admin.php');
        }
        else {
            $message = '<p style="color: red; font-size: 18px; margin:10px">Login ou mot de passe incorrect. Veuillez réessayer.</p>';
            include('../Client/connexion.php');
            header('location: ../Client/connexion.php');
        }
    }
    if($check == "client"){
        $user = login_client($email, $password);
        $res = mysqli_fetch_assoc($user); 
        if($res) {
           header('location: ../Client/accueil.php?Login='.$res['Prenom'].'&id='.$res['id_client']);
        }
        else {
            $message = '<p style="color: red; font-size: 18px; margin:10px">Login ou mot de passe incorrect. Veuillez réessayer.</p>';
            include('../Client/connexion.php');
            header('location: ../Client/connexion.php');
        }
    }
?>


