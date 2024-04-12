
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "Taches.php";
// Définir les constantes pour les informations de la base de données
define('DB_SERVER' , 'localhost' );
define('DB_USERNAME' , 'root' );
define('DB_PASSWORD' , '' );
define('DB_NAME' , 'Gestionnaire_de_Taches');




try {
   $connexion = new PDO ("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
} catch (PDOExeption $e) {
   die("Erreur : Impossible de se connecter à la base de données " . $e->getMessage());
}
 
$taches = new Taches ($connexion, "A", "X", "2024-03-02
","2024-04-12 01:11:19","faire", "En attente");
$Tache = $taches-> readTaches();

?>