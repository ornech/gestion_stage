<?php
require_once '../config/auth.php';

function verifEtu($Profil, $conn){
  $table_name = "user";
  
  $needSetPromo = false;
  $promo = $Profil->promo;
  $classe = $Profil->classe;
  $newClasse = null;

  if($Profil->statut == "Etudiant"){
    if(($promo == null || $promo == "") && $Profil->statut == "Etudiant"){
      $needSetPromo = true;
      $promo = assignPromo($Profil->date_entree);
    }
    $newClasse = assignClasseByPromo($promo);
  }else{
    $newClasse = "Enseignant";
  }

  if($classe != $newClasse || $needSetPromo == true){
    $classe = $newClasse;

    $sql = "UPDATE $table_name SET " . ($needSetPromo == true ? "promo=:promo, classe=:classe" : "classe=:classe") . " WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":classe", $classe, PDO::PARAM_STR);
    $stmt->bindParam(":id", $Profil->id, PDO::PARAM_INT);
    if($needSetPromo == true){
      $stmt->bindParam(":promo", $promo, PDO::PARAM_STR);
    }
    $stmt->execute();
  }
    return $classe;
}

function getAnneeScolaire(){
  $currentYear = date('Y');
  $today = new DateTime();

  // Définir les dates de début et de fin de l'année scolaire
  $finAnneeScolaire = new DateTime("$currentYear-06-30");
  $debutAnneeScolaire = new DateTime("$currentYear-09-01");

  // Si aujourd'hui est avant le 1er septembre, ajuster les années scolaires
  if ($today < $debutAnneeScolaire) {
    $debutAnneeScolaire->modify('-1 year');
  } else {
    $finAnneeScolaire->modify('+1 year');
  }

  return array("debut" => $debutAnneeScolaire,"fin" => $finAnneeScolaire);
}

function assignClasseByPromo($promo){
  $date = getAnneeScolaire();

  $finAnneeScolaire = $date["fin"];

  if ($promo == $finAnneeScolaire->format('Y')+1) {
    return "SIO1";
  } else if ($promo == $finAnneeScolaire->format('Y')) {
    return "SIO2";
  }else if ($promo < $finAnneeScolaire->format('Y')){
    return "Ancien étudiant";
  }
}

function assignPromo($dateArrivee) {
  $dateArrivee = new DateTime($dateArrivee);
  $arriveeYear = $dateArrivee->format('Y');

  $finAnneeScolaire = new DateTime("$arriveeYear-06-30");
  $debutAnneeScolaire = new DateTime("$arriveeYear-09-01");
  
  if ($dateArrivee < $debutAnneeScolaire) {
    $debutAnneeScolaire->modify('-1 year');
  } else {
    $finAnneeScolaire->modify('+1 year');
  }

  if ($dateArrivee < $finAnneeScolaire) {
    return $finAnneeScolaire->modify('+1 year')->format('Y');
  } else {
    return $finAnneeScolaire->format('Y');
  }
}