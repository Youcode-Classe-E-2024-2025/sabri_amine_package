<?php
    // $host = 'localhost';
    // $dbname = 'gestion_packagees';
    // $user = 'root';
    // $password = ''; 

    // try {
    //     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // } catch (PDOException $e) {
    //     die("Erreur : " . $e->getMessage());
    // }
?>

<?php

$host = 'localhost';
$dbname = 'gestion_packagees';
$user = 'root';
$password = ''; 
  //connexion à la base de données
  $con = mysqli_connect($host,$user,$password,$dbname);
  if(!$con){
     echo "Vous n'êtes pas connecté à la base de donnée";
  }
?>