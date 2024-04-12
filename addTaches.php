<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Inclure le fichier de connexion à la base de données et la classe Taches
include_once 'config.php';
include_once 'Taches.php';

// Vérifier si le formulaire a été soumis

if(isset($_POST['submit'])){
    // Récupérer les données du formulaire
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $date_echeance = $_POST['date_echeance'];
    $date_insertion = $_POST['date_insertion'];
    $priorite = $_POST['priorite'];
    $etat = $_POST['etat'];

     // verifier si les champs ne sont pas vides
  if($libelle!= "" && $description != "" && $date_echeance != "" && $date_insertion != "" && $priorite != "" && $etat != "") {
    
    $taches->addTaches($libelle, $description, $date_echeance, $date_insertion, $priorite, $etat);
  }

    }
