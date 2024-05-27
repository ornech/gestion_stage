<?php
require_once 'config/auth.php';
function verifgroupe($Profil, $conn, $dateActuelle) {
    // Récupération des données du profil   
    $table_name = "User";
    $sql = "UPDATE " . $table_name . " SET classe = :classe WHERE id = :id";
    $status = $Profil->statut;
    $date = $Profil->date_entree;
    $dateEntree = ($date != null) ? new DateTime($date) : null;
    $datediff = ($dateEntree != null) ? $dateActuelle->diff($dateEntree) : null;
    $classebdd = $Profil->classe;
    if ($status === 'Etudiant') {
        if ($datediff->days < 350) {
            $classe = "SIO1"; 
            if ($classebdd != $classe) {
                $sql = "UPDATE user SET classe = :classe WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            }

        } 
        elseif ($datediff->days < 720) {
            $classe = "SIO2";
            if ($classebdd != $classe) {
                $sql = "UPDATE user SET classe = :classe WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

            } 
            }

        elseif ($datediff->days >= 720) {
            $classe = "Ancien étudiant";
            if ($classebdd != $classe) {
                $sql = "UPDATE user SET classe = :classe WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            }

        } 
        else {
            $classe = "Non défini";
            if ($classebdd != $classe) {
                $sql = "UPDATE user SET classe = :classe WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
            }
        }
        return $classe;
    } 
    
    else {
        $classe = "Enseignant";
        $sql = "UPDATE user SET classe = :classe WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        }
   return $classe;
   
    }

 



?>