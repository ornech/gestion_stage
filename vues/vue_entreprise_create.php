<?php
// fichier vues/vue_modif_entreprise.php
require_once 'config/auth.php';
// require_once __DIR__ . '/../config/auth.php';
?>
<SCRIPT>
function getValue() {
    // Sélectionner l'élément input et récupérer sa valeur
    var input = document.getElementById("siret").value;
    var url = ("https://annuaire-entreprises.data.gouv.fr/etablissement/" + input);
    // Afficher la valeur . input;
    window.location.href=url;
}
</SCRIPT>

<H2 class="display-6"> Ajouter une entreprise</H2>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="siret-tab" data-bs-toggle="tab" data-bs-target="#siret" type="button" role="tab" aria-controls="home" aria-selected="true">A partir du siret</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Manuellement</button>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane show active" id="siret" role="tabpanel" aria-labelledby="home-tab">
    <BR>
    <p>Importez les données relative à une entreprise à partir de son numéro de SIRET.</p>
    <form action="../controller/entreprise_create_siret.php" method="GET" class="form-group mb-3">
      <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"];?>">
      <div class="input-group mb-3">  <span class="input-group-text">Renseignez le N° de SIRET</span>
            <input type="text" class="form-control" name="siret" required minlength="14" maxlength="14" size="14" >
        <button class="btn btn-outline-secondary" onclick="getValue();" type="button">Vérifier le N° de SIRET</button>
        <button class="btn btn-outline-primary" type="submit">Valider</button>

      </div>

    </form>

  </div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="siret-tab">
    <BR>
    <p>Renseignez les champs manuellement</p>

    <form action="../controller/creer_entreprise.php" method="POST">
      <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"];?>">
      <div class="container">
        <div class="row">
          <div class="col">

            <label for="nomEntreprise" class="form-label mb-0">Nom de l'entreprise</label>
            <input type="text" class="form-control mb-3" id="nomEntreprise" name="nomEntreprise" value="" required>
            <div class="row">
              <div class="col">
                <label for="naf" class="form-label mb-0">Code NAF</label>
                <input type="text" class="form-control  mb-3" id="naf" name="naf">
              </div>
              <div class="col">
                <label for="siret" class="form-label mb-0">SIRET</label>
                <input type="text" class="form-control  mb-3" id="siret" name="siret" >
              </div>
            </div>
          </div>
          <div class="col">
            <label for="adresse" class="form-label mb-0">Adresse</label>
            <input type="text" class="form-control  mb-3" id="adresse" name="adresse" required>
              <div class="row">
                <div class="col">
                  <label for="ville" class="form-label mb-0">Ville</label>
                  <input type="text" class="form-control  mb-3" id="ville" name="ville" required >
                </div>
                <div class="col">
                  <label for="codePostal" class="form-label mb-0">Code postal</label>
                  <input type="text" class="form-control  mb-3" id="codePostal" maxlength="5" required name="codePostal" >
                </div>
                <div class="col">
                  <label for="dep_geo" class="form-label mb-0">Département</label>
                  <select class="form-select" id="dep_geo" name="dep_geo">
                    <option value="01">Ain</option>
                    <option value="02">Aisne</option>
                    <option value="03">Allier</option>
                    <option value="04">Alpes-de-Haute-Provence</option>
                    <option value="05">Hautes-Alpes</option>
                    <option value="06">Alpes-Maritimes</option>
                    <option value="07">Ardèche</option>
                    <option value="08">Ardennes</option>
                    <option value="09">Ariège</option>
                    <option value="10">Aube</option>
                    <option value="11">Aude</option>
                    <option value="12">Aveyron</option>
                    <option value="13">Bouches-du-Rhône</option>
                    <option value="14">Calvados</option>
                    <option value="15">Cantal</option>
                    <option value="16">Charente</option>
                    <option value="17">Charente-Maritime</option>
                    <option value="18">Cher</option>
                    <option value="19">Corrèze</option>
                    <option value="2A">Corse-du-Sud</option>
                    <option value="2B">Haute-Corse</option>
                    <option value="21">Côte-d'Or</option>
                    <option value="22">Côtes-d'Armor</option>
                    <option value="23">Creuse</option>
                    <option value="24">Dordogne</option>
                    <option value="25">Doubs</option>
                    <option value="26">Drôme</option>
                    <option value="27">Eure</option>
                    <option value="28">Eure-et-Loir</option>
                    <option value="29">Finistère</option>
                    <option value="30">Gard</option>
                    <option value="31">Haute-Garonne</option>
                    <option value="32">Gers</option>
                    <option value="33">Gironde</option>
                    <option value="34">Hérault</option>
                    <option value="35">Ille-et-Vilaine</option>
                    <option value="36">Indre</option>
                    <option value="37">Indre-et-Loire</option>
                    <option value="38">Isère</option>
                    <option value="39">Jura</option>
                    <option value="40">Landes</option>
                    <option value="41">Loir-et-Cher</option>
                    <option value="42">Loire</option>
                    <option value="43">Haute-Loire</option>
                    <option value="44">Loire-Atlantique</option>
                    <option value="45">Loiret</option>
                    <option value="46">Lot</option>
                    <option value="47">Lot-et-Garonne</option>
                    <option value="48">Lozère</option>
                    <option value="49">Maine-et-Loire</option>
                    <option value="50">Manche</option>
                    <option value="51">Marne</option>
                    <option value="52">Haute-Marne</option>
                    <option value="53">Mayenne</option>
                    <option value="54">Meurthe-et-Moselle</option>
                    <option value="55">Meuse</option>
                    <option value="56">Morbihan</option>
                    <option value="57">Moselle</option>
                    <option value="58">Nièvre</option>
                    <option value="59">Nord</option>
                    <option value="60">Oise</option>
                    <option value="61">Orne</option>
                    <option value="62">Pas-de-Calais</option>
                    <option value="63">Puy-de-Dôme</option>
                    <option value="64">Pyrénées-Atlantiques</option>
                    <option value="65">Hautes-Pyrénées</option>
                    <option value="66">Pyrénées-Orientales</option>
                    <option value="67">Bas-Rhin</option>
                    <option value="68">Haut-Rhin</option>
                    <option value="69">Rhône</option>
                    <option value="70">Haute-Saône</option>
                    <option value="71">Saône-et-Loire</option>
                    <option value="72">Sarthe</option>
                    <option value="73">Savoie</option>
                    <option value="74">Haute-Savoie</option>
                    <option value="75">Paris</option>
                    <option value="76">Seine-Maritime</option>
                    <option value="77">Seine-et-Marne</option>
                    <option value="78">Yvelines</option>
                    <option value="79">Deux-Sèvres</option>
                    <option value="80">Somme</option>
                    <option value="81">Tarn</option>
                    <option value="82">Tarn-et-Garonne</option>
                    <option value="83">Var</option>
                    <option value="84">Vaucluse</option>
                    <option value="85">Vendée</option>
                    <option value="86">Vienne</option>
                    <option value="87">Haute-Vienne</option>
                    <option value="88">Vosges</option>
                    <option value="89">Yonne</option>
                    <option value="90">Territoire de Belfort</option>
                    <option value="91">Essonne</option>
                    <option value="92">Hauts-de-Seine</option>
                    <option value="93">Seine-Saint-Denis</option>
                    <option value="94">Val-de-Marne</option>
                    <option value="95">Val-d'Oise</option>
                    <option value="971">Guadeloupe</option>
                    <option value="972">Martinique</option>
                    <option value="973">Guyane</option>
                    <option value="974">La Réunion</option>
                    <option value="976">Mayotte</option>
                  </select>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" class="btn btn-primary" name="submit" value="Enregistrer">
          </div>
        </div>
      </form>

  </div>
</div>



<!--
<H2> Proposition </H2>
<form action="../controller/entreprise_create_siret.php" method="GET" class="form-group mb-3">
  <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"];?>">
  <div class="input-group mb-3">  <span class="input-group-text">Renseignez le N° de SIRET</span>
        <input type="text" class="form-control" name="siret" required minlength="14" maxlength="14" size="14" >
    <button class="btn btn-outline-secondary" onclick="getValue();" type="button">Vérifier le N° de SIRET</button>
    <button class="btn btn-outline-primary" type="submit">Valider</button>

  </div>

</form>

<h2>Ajouter une entreprise</h2>
<form action="../controller/creer_entreprise.php" method="POST">
  <input type="hidden" name="Created_UserID" value="<?= $_SESSION["userID"];?>">
  <div class="container">
    <div class="row">
      <div class="col">

        <label for="nomEntreprise" class="form-label">Nom de l'entreprise</label>
        <input type="text" class="form-control" id="nomEntreprise" name="nomEntreprise" value="" required>
        <div class="row">
          <div class="col">
            <label for="naf" class="form-label">Code NAF</label>
            <input type="text" class="form-control" id="naf" name="naf">
          </div>
          <div class="col">
            <label for="siret" class="form-label">SIRET</label>
            <input type="text" class="form-control" id="siret" name="siret" >
          </div>
        </div>
      </div>
      <div class="col">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse" required>
          <div class="row">
            <div class="col">
              <label for="ville" class="form-label">Ville</label>
              <input type="text" class="form-control" id="ville" name="ville" required >
            </div>
            <div class="col">
              <label for="codePostal" class="form-label">Code postal</label>
              <input type="text" class="form-control" id="codePostal" maxlength="5" required name="codePostal" >
            </div>
            <div class="col">
              <label for="dep_geo" class="form-label">Département</label>
              <select class="form-select" id="dep_geo" name="dep_geo">
                <option value="01">Ain</option>
                <option value="02">Aisne</option>
                <option value="03">Allier</option>
                <option value="04">Alpes-de-Haute-Provence</option>
                <option value="05">Hautes-Alpes</option>
                <option value="06">Alpes-Maritimes</option>
                <option value="07">Ardèche</option>
                <option value="08">Ardennes</option>
                <option value="09">Ariège</option>
                <option value="10">Aube</option>
                <option value="11">Aude</option>
                <option value="12">Aveyron</option>
                <option value="13">Bouches-du-Rhône</option>
                <option value="14">Calvados</option>
                <option value="15">Cantal</option>
                <option value="16">Charente</option>
                <option value="17">Charente-Maritime</option>
                <option value="18">Cher</option>
                <option value="19">Corrèze</option>
                <option value="2A">Corse-du-Sud</option>
                <option value="2B">Haute-Corse</option>
                <option value="21">Côte-d'Or</option>
                <option value="22">Côtes-d'Armor</option>
                <option value="23">Creuse</option>
                <option value="24">Dordogne</option>
                <option value="25">Doubs</option>
                <option value="26">Drôme</option>
                <option value="27">Eure</option>
                <option value="28">Eure-et-Loir</option>
                <option value="29">Finistère</option>
                <option value="30">Gard</option>
                <option value="31">Haute-Garonne</option>
                <option value="32">Gers</option>
                <option value="33">Gironde</option>
                <option value="34">Hérault</option>
                <option value="35">Ille-et-Vilaine</option>
                <option value="36">Indre</option>
                <option value="37">Indre-et-Loire</option>
                <option value="38">Isère</option>
                <option value="39">Jura</option>
                <option value="40">Landes</option>
                <option value="41">Loir-et-Cher</option>
                <option value="42">Loire</option>
                <option value="43">Haute-Loire</option>
                <option value="44">Loire-Atlantique</option>
                <option value="45">Loiret</option>
                <option value="46">Lot</option>
                <option value="47">Lot-et-Garonne</option>
                <option value="48">Lozère</option>
                <option value="49">Maine-et-Loire</option>
                <option value="50">Manche</option>
                <option value="51">Marne</option>
                <option value="52">Haute-Marne</option>
                <option value="53">Mayenne</option>
                <option value="54">Meurthe-et-Moselle</option>
                <option value="55">Meuse</option>
                <option value="56">Morbihan</option>
                <option value="57">Moselle</option>
                <option value="58">Nièvre</option>
                <option value="59">Nord</option>
                <option value="60">Oise</option>
                <option value="61">Orne</option>
                <option value="62">Pas-de-Calais</option>
                <option value="63">Puy-de-Dôme</option>
                <option value="64">Pyrénées-Atlantiques</option>
                <option value="65">Hautes-Pyrénées</option>
                <option value="66">Pyrénées-Orientales</option>
                <option value="67">Bas-Rhin</option>
                <option value="68">Haut-Rhin</option>
                <option value="69">Rhône</option>
                <option value="70">Haute-Saône</option>
                <option value="71">Saône-et-Loire</option>
                <option value="72">Sarthe</option>
                <option value="73">Savoie</option>
                <option value="74">Haute-Savoie</option>
                <option value="75">Paris</option>
                <option value="76">Seine-Maritime</option>
                <option value="77">Seine-et-Marne</option>
                <option value="78">Yvelines</option>
                <option value="79">Deux-Sèvres</option>
                <option value="80">Somme</option>
                <option value="81">Tarn</option>
                <option value="82">Tarn-et-Garonne</option>
                <option value="83">Var</option>
                <option value="84">Vaucluse</option>
                <option value="85">Vendée</option>
                <option value="86">Vienne</option>
                <option value="87">Haute-Vienne</option>
                <option value="88">Vosges</option>
                <option value="89">Yonne</option>
                <option value="90">Territoire de Belfort</option>
                <option value="91">Essonne</option>
                <option value="92">Hauts-de-Seine</option>
                <option value="93">Seine-Saint-Denis</option>
                <option value="94">Val-de-Marne</option>
                <option value="95">Val-d'Oise</option>
                <option value="971">Guadeloupe</option>
                <option value="972">Martinique</option>
                <option value="973">Guyane</option>
                <option value="974">La Réunion</option>
                <option value="976">Mayotte</option>
              </select>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="submit" class="btn btn-primary" name="submit" value="Enregistrer les modifications">
      </div>
    </div>
  </form>
-->
