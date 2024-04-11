
<?php
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


?>