<?php
require_once 'config/auth.php';
function verifgroupe($Profil, $conn, $dateActuelle) {
    // Récupération des données du profil   
    $table_name = "User";
    $status = $Profil->statut;
    $date = $Profil->date_entree;
    $id = $Profil->id;
    $dateEntree = ($date != null) ? new DateTime($date) : null;
    $datediff = ($dateEntree != null) ? $dateActuelle->diff($dateEntree) : null;
    $classebdd = $Profil->classe;
    if ($status === 'Etudiant') {
        if ($datediff !== null) {
            if ($datediff->days < 350 && $classebdd != "SIO1") {
                $classe = "SIO1";
            } 
            elseif ($datediff->days < 720 && $classebdd != "SIO2" && $datediff->days >= 350) {
                $classe = "SIO2";
            } 
            elseif ($datediff->days >= 720 && $classebdd != "Ancien étudiant") {
                $classe = "Ancien étudiant";
            } 
            else {
                $classe = $classebdd;
            }

            $sql = "UPDATE " . $table_name . " SET classe = :classe WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $classe;
        }
    } 
    else {
        $classe = "Enseignant";
        $sql = "UPDATE " . $table_name . " SET classe = :classe WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':classe', $classe, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $classe;
    }
}
?>