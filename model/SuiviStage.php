<?php

class SuiviStage {
    private $conn;
    private $table_name = "Suivi_stage";

    public $idStage;
    public $idEntreprise;
    public $idMaitreDeStage;
    public $idEtudiant;
    public $titreStage;
    public $description;
    public $dateDebut;
    public $dateFin;

    public function __construct($db){
        $this->conn = $db;
    }

    // Méthodes CRUD à implémenter
}
?>
