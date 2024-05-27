<?php
require_once 'config/auth.php';

function verifgroupe($conn, $dateActuelle) {
    // Récupération des données du profil   
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $status = isset($_GET['statut']) ? $_GET['statut'] : null;
    $date = isset($_GET['date_entree']) ? $_GET['date_entree'] : null;
    $dateEntree = ($date != null) ? new DateTime($date) : null;
    $datediff = ($dateEntree != null) ? $dateActuelle->diff($dateEntree) : null;
    $classe="";
    $classebdd = isset($_GET['classe']) ? $_GET['classe'] : null;
    // var_dump($id);
    // var_dump($conn);
    // var_dump($date);
    // var_dump($datediff);
    // var_dump($classebdd);
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

        elseif ($datediff->days > 720) {
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