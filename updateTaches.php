<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "config.php";
require_once "Taches.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tache = $taches->getById($id);
}
        if(isset($_POST['submit'])){
        // Récupération des valeurs soumises par le formulaire
        
        $libelle = htmlspecialchars($_POST['libelle']);
        $description = htmlspecialchars($_POST['description']);
        $etat = htmlspecialchars($_POST['etat']);
        
        
    
        // Vérification que toutes les données sont fournies
        if (!empty($libelle) && !empty($description) && !empty($etat) && !empty($id)) {
            echo "everything  find";
            // Appel à la méthode d'update de la classe Taches
            $updateTache = $taches->updateTaches($id, $libelle, $description, $etat);
            
              
                exit();
            if ($updateTache) {
                echo "Les données ont été mises à jour avec succès.";
            } else {
                echo "Une erreur s'est produite lors de la mise à jour des données.";
            }
        } else {
            echo "Veuillez fournir toutes les données nécessaires.";
        }
    }    

?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            display: grid;
            grid-gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-top: 4px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    
<div class="container">
        <h2>Nouvelle Tâche</h2>
        <form action="updateTaches.php?id=<?php echo $tache['id']; ?>" method="POST">
            <div class="form-group">
                <label for="libelle">Libellé :</label>
                <input type="text" id="libelle" name="libelle" value="<?= $tache['libelle'] ?>"> required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" required><?= $tache['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="etat">État :</label>
                <select id="etat" name="etat" required>
                    <option value="F" <?php if ($tache['etat'] === 'F') echo 'selected'; ?>>À Faire</option>
                    <option value="C" <?php if ($tache['etat'] === 'C') echo 'selected'; ?>>En cours</option>
                    <option value="T" <?php if ($tache['etat'] === 'T') echo 'selected'; ?>>Terminée</option>
                </select>
            </div>

            <button name="submit" type="submit">Modifier</button>
        </form>