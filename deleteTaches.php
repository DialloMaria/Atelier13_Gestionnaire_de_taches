<?php
 require_once "config.php";
//on s'assure que id du Taches supprimer est passé dans la requete GET

if(isset($_GET['id'])){
    $id = $_GET['id'];

     $taches ->deleteTaches($id);
 } else {
     echo "Id taches non specifié";
}


?>