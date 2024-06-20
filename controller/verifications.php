<?php

if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/Classe.php';

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

    $sql = "UPDATE $table_name SET " . "classe=:classe";
    
    if($needSetPromo == true){
      $sql .= ", promo=:promo";
    }
    
    $sql = $sql . " WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":classe", $classe, PDO::PARAM_STR);
    $stmt->bindParam(":id", $Profil->id, PDO::PARAM_INT);
    if($needSetPromo == true){
      $stmt->bindParam(":promo", $promo, PDO::PARAM_STR);
    }
    $stmt->execute();
  }  
}

function verifClasseCount($classe, $conn){
  include_once '../model/Profil.php';
  include_once '../model/Classe.php';

  $profilModel = new Profil($conn);

  $etus = $profilModel->list_by_classe($classe);
  $nbrEtu = count($etus);

  $promo = assignPromoByClasse($classe);

  $SLAM = $profilModel->countSpeByClasse($classe, "SLAM")->count;
  $SISR = $profilModel->countSpeByClasse($classe, "SISR")->count;
  
  $classeModel = new Classe($conn);

  var_dump($classeModel->getByClasseAndPromo($classe, $promo));
  if(!$classeModel->getByClasseAndPromo($classe, $promo)){
    echo "create $classe";
    $classeModel->create($classe, $promo);
  }
  
  $classeModel->updateNbrEtu($nbrEtu, $classe, $promo);
  $classeModel->updateNbrSpe($SLAM, "slam",$classe, $promo);
  $classeModel->updateNbrSpe($SISR, "sisr",$classe, $promo);
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

function assignPromoByClasse($classe){
  $date = getAnneeScolaire();

  $finAnneeScolaire = $date["fin"];

  if ($classe == "SIO1") {
    return $finAnneeScolaire->format('Y')+1;
  } else if ($classe == "SIO2") {
    return $finAnneeScolaire->format('Y');
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