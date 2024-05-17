<?php

class Contact {
    private $conn;
    private $table_name = "Employe";

    public function __construct($db){
        $this->conn = $db;
    }

        // try {
        //         if($stmt->execute()){
        //             return true;
        //         } else {
        //             throw new Exception("Erreur lors de l'exécution de la requête.");
        //         }
        //     } catch (Exception $e) {
        //         //echo "Erreur : " . $e->getMessage();
        //         $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
        //         header("Location: ../router.php?page=erreur&message=$message");
        //         return false;
        //     }

    // Liste des entreprises
    public function read_list($idEntrepriset){
      $query = "SELECT * FROM Contact_employe WHERE EntrepriseID = :idEntrepriset";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function read_fiche($idContact) {
        $query = "SELECT * FROM Contact_employe WHERE EmployeID = :idContact";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idContact', $idContact, PDO::PARAM_INT);
        $stmt->execute();
        // Retournez directement le résultat
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


}
?>
