<?php
require_once '../database/config.php';

function login_admin($email, $password) {
    global $conn;
    $query = "SELECT * FROM admins WHERE Email='$email' AND Mot_de_passe='$password'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function login_client($email, $password) {
    global $conn;
    $query = "SELECT * FROM clients WHERE Email='$email' AND Mot_de_passe='$password'";
    $result = mysqli_query($conn, $query);
    return $result;
}