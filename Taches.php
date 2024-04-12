
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Creation de la classe Taches
class Taches {

    //Creation des propriétés
    private $connexion;
    private $libelle;
    private $description;
    private $date_echeance;
    private $date_insertion;
    private $priorite;
    private $etat;

    // Creation de la fonction construct

    public function __construct( $connexion,$libelle, $description, $date_echeance, $date_insertion, $priorite, $etat){
      $this->connexion=$connexion;
      $this->libelle=$libelle;
      $this->description=$description;
      $this->date_echeance=$date_echeance;
      $this->date_insertion=$date_insertion;
      $this->priorite=$priorite;
      $this->etat=$etat;
    }
    public function getlibelle(){
        return $this->libelle;
    }
    public function getdescription(){
        return $this->description;
    }
    public function getdate_echeance(){
        return $this->date_echeance;
    }
    public function getdate_insertion(){
        return $this->date_insertion;
    }
    public function getpriorite(){
        return $this->priorite;
    }
    public function getetat(){
        return $this->etat;
    }
    //Creation des fontions
    
    public function addTaches($libelle, $description, $date_echeance, $date_insertion, $priorite, $etat) {
        // Votre code pour ajouter une tâche à la base de données
    
        try {
            // Requête pour insérer un nouveau Taches
            $sql = "INSERT INTO Taches (libelle, description, date_echeance, date_insertion, priorite, etat) 
                    VALUES (:libelle, :description, :date_echeance, :date_insertion, :priorite, :etat)";
    
            // Preparation de la requête
            $stmt = $this->connexion->prepare($sql);
    
            // Lier les valeurs aux paramètres avec bindParam
            $stmt->bindParam(':libelle', $libelle);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':date_echeance', $date_echeance);
            $stmt->bindParam(':date_insertion', $date_insertion);
            $stmt->bindParam(':priorite', $priorite); // Notez que le paramètre est 'priorite', pas 'priorité'
            $stmt->bindParam(':etat', $etat);
    
            // Exécution de la requête d'insertion
            $stmt->execute();
    
            // Redirection vers la page index.php après une insertion réussie
            header("Location: readTaches.php");
            exit(); // arrêter l'exécution du script après la redirection avec exit()
        } catch (PDOException $e) {
            die("Erreur: Impossible d'ajouter une tâche" . $e->getMessage());
        }
    }
    
    public function readTaches(){
        try{
            //Requete pour selectionner tous les taches
            $sql = "SELECT * FROM Taches";
             //preparation de la requete
             $stmt=$this->connexion->prepare($sql);

             //exécution de la requete
             $stmt->execute();
 
             //recuperation des resultats
             $Tache=$stmt->fetchAll(PDO::FETCH_ASSOC);
             return $Tache;
         } 
         catch (PDOException $e) {
             die("erreur:Impossible d'afficher les habitants" .$e->getMessage());
         }
        }

}




?>