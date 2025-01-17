
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "CRUDTaches.php";
//Creation de la classe Taches
class Taches  {

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

    public function deleteTaches($id){
        try {
             //requete pour supprimer une taches
            $sql = "DELETE FROM Taches WHERE id = :id";

            //preparation de la requete 
            $stmt = $this->connexion->prepare($sql);

            // Liaison de la valeur de l'id au paramètre
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécution de la requête
            $stmt->execute();
             
            header("Location: readTaches.php");
            exit();

        } catch (PDOEXception $e) {
            throw new Exception("ERREUR: Impossible de supprimer le billet. " . $e->getMessage());
        }
    }  
    
    public function getById($id){
        try {
            $sql = "SELECT * FROM Taches WHERE id = :id";

            //preparation de la requete 
            $stmt = $this->connexion->prepare($sql);

            // Liaison de la valeur de l'id au paramètre
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécution de la requête
            $stmt->execute();
             
            $tache = $stmt->fetch(PDO::FETCH_ASSOC);
            return $tache;
        } catch (PDOExecption $e) {
            echo "Une erreur s'est produite : " . $th->getMessage();
            return null;
        }
    }
    public function updateTaches($id, $libelle,$description,$etat){
        try {
        //Requete pour faire la modificaton
        $sql = "UPDATE Taches SET libelle = :libelle, description = :description, etat = :etat WHERE id = :id";

        //preparation de la requete 
        $stmt = $this->connexion->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':etat', $etat);

        // Exécution de la requête
        $stmt->execute();

        header("Location: readTaches.php");
        exit();
    
        } catch (PDOException $e) {
            throw new Exception("ERREUR: Impossible de modifier une Tache. " . $e->getMessage());
        }

}

}

?>