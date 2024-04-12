<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 require_once "config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Tâches</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .bouton{
            
            color:red;
        }
    </style>
</head>
<body>
    <h2>Tableau des Tâches</h2>
    <table>
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Date d'échéance</th>
                <th>Priorité</th>
                <th>État</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
       <?php if($Tache !== null) ?>;
            <?php foreach ($Tache as $Taches) { ?>
                <tr>
                    <td><?php echo $Taches['libelle']; ?></td>
                    <td><?php echo $Taches['Date_echeance']; ?></td>
                    <td><?php echo $Taches['priorite']; ?></td>
                    <td><?php echo $Taches['etat']; ?></td>
                    <td><button class="btn btn-delete"><a href="deleteTaches.php?id=<?php echo $Taches ['id']; ?>">Supprimer</a></button></td>
                    <td><button class="btn btn-delete"><a href="updateTaches.php?id=<?php echo $Taches ['id']; ?>">Modifier</a></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="bouton">
        <button><a href="index.php">Retour</a></button>
    </div>
</body>
    
</html>
