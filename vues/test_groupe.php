<?php
function verifgroupe($Profil, $dateActuelle) {
    $groupe = "";
    
    $status = $Profil->statut;
    $date_chaine = $Profil->date_entree;
    $dateEntree = ($date_chaine != null) ? new DateTime($date_chaine) : null;
    $datediff = ($dateEntree != null) ? $dateActuelle->diff($dateEntree) : null;

    if ($status === 'Etudiant') {
        if ($datediff->days < 365) {
            $groupe = "SIO 1";
        } elseif ($datediff->days < 720) {
            $groupe = "SIO 2";
        } elseif ($datediff->days > 720) {
            $groupe = "Ancien étudiant";
        } else {
            $groupe = "Non défini";
        }
    } else {
        $groupe = "Enseignant";
    }

    return $groupe;
}
?>