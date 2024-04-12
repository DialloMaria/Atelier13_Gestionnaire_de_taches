<?php
error_reporting(E_ALL);

require_once "config.php";
interface Client{
    public function addTaches($libelle, $description, $date_echeance, $date_insertion, $priorite, $etat);
    public function readTaches();
    public function deleteTaches();
    public function updateTaches();
    
}

