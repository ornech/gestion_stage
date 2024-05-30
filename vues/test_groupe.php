<?php
require_once 'config/auth.php';

function verifgroupe($Profil, $conn, $dateActuelle) {
  // Récupération des données du profil   
  $table_name = "user";
  $status = $Profil->statut;
  $date = $Profil->date_entree;
  $id = $Profil->id;
  $dateEntree = ($date != null) ? new DateTime($date) : null;
  $classebdd = $Profil->classe;
  
  $classeSelect = null;

  if ($status === 'Etudiant') {
    if ($dateEntree !== null) {
      $classeSelect = assignClasse($dateEntree);
    }
  }else{
    $classeSelect = "Enseignant";
  }

  if($classeSelect != $classebdd) {
    $sql = "UPDATE " . $table_name . " SET classe = :classe WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':classe', $classeSelect, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
  
  return $classeSelect;
}

function assignClasse($dateAVerif) {
  $currentYear = date('Y');

  //Les dates de l'année pour SIO 1
  $dateActEntr = new DateTime($currentYear - 1 . '-09-01');
  $dateActFinEntr = new DateTime($currentYear . '-08-31');

  //Les dates de l'année pour SIO 2
  $date3 = new DateTime(($currentYear - 2) . '-09-01');
  $date4 = new DateTime($currentYear - 1 . '-08-31');

  // echo "dateActEntr : " . $dateActEntr->format('Y-m-d') . "<br>" . "dateActFinEntr : " . $dateActFinEntr->format('Y-m-d') . "<br>" . "date3 : " . $date3->format('Y-m-d') . "<br>" . "date4 : " . $date4->format('Y-m-d') . "<br>" . "dateAVerif : " . $dateAVerif->format('Y-m-d') . "<br>";
  
  if ($dateAVerif >= $dateActEntr && $dateAVerif <= $dateActFinEntr) {
    return "SIO1";
  } elseif ($dateAVerif >= $date3 && $dateAVerif <= $date4) {
    return "SIO2";
  } elseif ($dateAVerif < $dateActFinEntr) {
    return "Ancien étudiant";
  } else {
    return "Futur SIO1";
  }
}
