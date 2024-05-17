<?php

class Contact {
    private $conn;
    private $table_name = "Employe";
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $fonction;
    private $idEntreprise;
    private $Created_UserID;

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
        $stmt->bindParam(':idEntrepriset', $idEntrepriset, PDO::PARAM_INT);
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

    public function create_contact($nom,$prenom,$email,$telephone,$fonction,$idEntreprise,$Created_UserID){
        echo $nom . " " . $prenom . " " . $email . " " . $telephone . " " . $fonction . " " . $idEntreprise . " " . $Created_UserID;
        $query = "INSERT INTO " . $this->table_name . " SET idEntreprise=:idEntreprise ,
            nom=:nom ,
            prenom=:prenom ,
            email=:email ,
            telephone=:telephone ,
            fonction=:fonction , 
            Created_UserID=:Created_UserID,
            Created_date=NOW()";
    
        $stmt = $this->conn->prepare($query);
        $this->nom=htmlspecialchars(strip_tags($nom));
        $this->prenom=htmlspecialchars(strip_tags($prenom));
        $this->email=htmlspecialchars(strip_tags($email));
        $this->telephone=htmlspecialchars(strip_tags($telephone));
        $this->fonction=htmlspecialchars(strip_tags($fonction));
        $this->idEntreprise=htmlspecialchars(strip_tags($idEntreprise));
        $this->Created_UserID=htmlspecialchars(strip_tags($Created_UserID));
    
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telephone", $this->telephone);
        $stmt->bindParam(":fonction", $this->fonction);
        $stmt->bindParam(":idEntreprise", $this->idEntreprise);
        $stmt->bindParam(":Created_UserID", $this->Created_UserID);
    
        try {
            if($stmt->execute()){
                return true;
            } else {
                throw new Exception("Erreur lors de l'exécution de la requête.");
            }
        } catch (Exception $e) {
            //echo "Erreur : " . $e->getMessage();
            $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
            header("Location: ../router.php?page=erreur&title=Erreur lors de la création du contact&message=$message");
            return false;
        }
    }

}
?>
