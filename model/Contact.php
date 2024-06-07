<?php

class Contact {
    private $conn;
    private $table_name = "employe";
    private $vue_name = "contact_employe";
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
    public function list(){
        $query = "SELECT * FROM ". $this->vue_name . " WHERE contact_valide = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function read_list($idEntreprise){
        $query = "SELECT * FROM ". $this->vue_name . " WHERE EntrepriseID = :idEntreprise AND contact_valide = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idEntreprise', $idEntreprise, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function read_list_siret($siret){
        $query = "SELECT * FROM ". $this->vue_name . " WHERE EntrepriseID = (SELECT id from entreprise WHERE siret =:siret) AND contact_valide = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':siret', $siret, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function contact_update($idContact, $email, $telephone, $fonction, $service, $Created_UserID) {
      require_once '../controller/controller_log.php';
      $oldValue = $this->read_fiche($idContact);
      
      $query = "UPDATE " . $this->table_name . "  SET
      email=:email ,
      telephone=:telephone ,
      fonction=:fonction ,
      service=:service ,
      created_userid=:created_userid
      WHERE id = :id AND contact_valide = 1";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':id', $idContact, PDO::PARAM_INT);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':telephone', $telephone);
      $stmt->bindParam(':fonction', $fonction);
      $stmt->bindParam(':service', $service);
      $stmt->bindParam(':created_userid', $Created_UserID);

      try {
        if($stmt->execute()){
          //Obtenir les données que l'on vient de créer dans la table
          $newValue = $this->read_fiche($idContact);
          if(addLog($this->conn, 10, $Created_UserID, "contact", $idContact, $oldValue, $newValue)){
            return true;
          }
            return false;
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
      } catch (Exception $e) {
          //echo "Erreur : " . $e->getMessage();
          $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
          header("Location: ../router.php?page=erreur&title=Update contact&message=$message");
          return false;
      }
    }

    public function read_fiche($idContact) {
        $query = "SELECT * FROM ". $this->vue_name . " WHERE EmployeID = :idContact";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idContact', $idContact, PDO::PARAM_INT);
        $stmt->execute();
        // Retournez directement le résultat
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function list_need_validation() {
      $query = "SELECT * FROM ". $this->vue_name . " WHERE contact_valide = 0";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      // Retournez directement le résultat
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    } 

    public function valider_contact($id){
      $query = "UPDATE " . $this->table_name . " SET contact_valide = 1 WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      try {
        if($stmt->execute()){
            return true;
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
      } catch (Exception $e) {
          //echo "Erreur : " . $e->getMessage();
          $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
          header("Location: ../router.php?page=erreur&title=Validation contact&message=$message");
          return false;
      }
    }

    public function create_contact($nom, $prenom, $email, $telephone, $fonction, $idEntreprise, $Created_UserID){
      require_once '../controller/controller_log.php';
      
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
            //Obtenir les données que l'on vient de créer dans la table
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE id = LAST_INSERT_ID();");
            $stmt->execute();
            $newValue = $stmt->fetch(PDO::FETCH_OBJ);
            if(addLog($this->conn, 9, $Created_UserID, "contact", $newValue->id, null, $newValue)){
              return true;
            }
              return false;
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

    public function deleteContact($id) {
      $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      try {
        if($stmt->execute()){
            return true;
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }
      } catch (Exception $e) {
          //echo "Erreur : " . $e->getMessage();
          $message = "Erreur SQL : " . implode(", ", $stmt->errorInfo());
          header("Location: ../router.php?page=erreur&title=Suppression contact&message=$message");
          return false;
      }
    } 

}
?>
