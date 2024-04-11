<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Tâche</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="date"],
textarea,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
<body>
    <div class="container">
        <h2>Nouvelle Tâche</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="libelle">Libellé :</label>
                <input type="text" id="libelle" name="libelle" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="date_echeance">Date d'échéance :</label>
                <input type="date" id="date_echeance" name="date_echeance" required>
            </div>
            <div class="form-group">
                <label for="priorite">Priorité :</label>
                <select id="priorite" name="priorite" required>
                    <option value="faible">Faible</option>
                    <option value="moyenne">Moyenne</option>
                    <option value="haute">Haute</option>
                </select>
            </div>
            <div class="form-group">
                <label for="etat">État :</label>
                <select id="etat" name="etat" required>
                    <option value="en_attente">En attente</option>
                    <option value="en_cours">En cours</option>
                    <option value="terminee">Terminée</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_insertion">Date d'insertion :</label>
                <input type="text" id="date_insertion" name="date_insertion" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
            </div>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
