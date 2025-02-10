<?php
require_once 'config/auth.php';
setlocale(LC_TIME, 'fr_FR.UTF-8');
$fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

if (isset($_GET["idStage"])) {

  include_once 'model/Stage.php'; // Inclure le modèle Stage
  include_once 'model/Classe.php'; // Inclure le modèle Classe
  include_once 'model/Profil.php'; // Inclure le modèle Profil

  $stageModel = new Stage($conn); // Instancier le modèle
  $classeModel = new Classe($conn); // Instancier le modèle
  $profilModel = new Profil($conn); // Instancier le modèle

  $stage = $stageModel->stage_by_id($_GET["idStage"]);
  $data = $stage[0];

  $classe = $classeModel->getProfPrincipalByClasseAndPromo($data->classe, $data->EtudiantPromo);

  $userPP = $profilModel->read_profil($classe->idProfPrincipal);

  $profPrincipal = $userPP->nom . " " . $userPP->prenom;

  // Colonnes vue_stage
  // idStage
  // idEntreprise
  // idMaitreDeStage
  // idEtudiant
  // classe
  // Statut
  // description
  // dateDebut
  // dateFin
  // idProfesseur
  // EtudiantNom
  // EtudiantPrenom
  // EtudiantEmail
  // EtudiantSpe
  // EtudiantPromo
  // siret
  // Entreprise
  // Entreprise_adresse
  // Entreprise_codePostal
  // Entreprise_ville
  // employe_nom
  // employe_prenom
  // employe_fonction

}

?>
<style>
  body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
  }

  .section {
    padding: 20px;
  }

  h1 {
    font-size: 2em;
    font-weight: bold;
    margin-bottom: 0.5em;
  }

  h2 {
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 0.5em;
  }

  h3 {
    font-size: 1.3em;
    font-weight: bold;
    margin-bottom: 0.5em;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th,
  td {
    border: 1px solid #ddd;
    padding: 8px;
    vertical-align: top;
  }

  th {
    background-color: #f2f2f2;
    text-align: left;
  }

  p {
    margin-bottom: 10px;
  }

  .page-break {
    page-break-before: always;
  }
</style>

<section class="section">
  <table border="0">
    <tr>
      <td>
        <img src="../img/logo-lmp.png" width="150px">
      </td>
      <td>
        <h1>
          <center>CONVENTION de STAGE</center>
        </h1>
      </td>
    </tr>
  </table>

  <table>
    <thead>
      <tr>
        <th>
          <h3>ENTRE</h3>
        </th>
        <th>
          <h3>ET</h3>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <strong>LE LYCÉE<br>MERLEAU-PONTY</strong>
        </td>
        <td>
          <strong><?= $data->Entreprise ?></strong>
        </td>
      </tr>
      <tr>
        <td>
          <strong>Représenté par :</strong><br>
          M. ABABSA<br>Proviseur<br><br>
          <strong>Adresse de l’établissement :</strong><br>
          3, Rue Raymonde Maous<br>BP 229<br>17304 ROCHEFORT CEDEX<br>Tél: 05 46 99 23 20<br>Mél: ce.0170022G@ac-poitiers.fr><br>
          <br><strong>Professeur responsable :</strong><br>
          Nom : <?= $profPrincipal; ?><br>Mél : <?= $userPP->email; ?>
        </td>
        <td>
          <strong>Représenté par :</strong> <?= $data->employe_nom ?> <?= $data->employe_prenom ?><br><br>
          <strong>Fonction : </strong> <?= $data->employe_fonction ?><br><br>
          <strong>Nom et adresse de l’entreprise :</strong><br><?= $data->Entreprise_adresse ?><br><?= $data->Entreprise_codePostal ?> <?= $data->Entreprise_ville ?><br><br>
          <strong>Tuteur du stagiaire :</strong><br>
          Nom :<br>Fonction :<br>Service :<br>Tél :<br>Mél :
        </td>
      </tr>
    </tbody>
  </table>

  <p>Concernant le stage de formation professionnelle de :</p>

  <table>
    <tr>
      <td><b>Nom :</b> <?= $data->EtudiantNom ?> <?= $data->EtudiantPrenom ?></td>
    </tr>
    <tr>
      <td><b>Section :</b> <?= $data->classe ?></td>
    </tr>
    <tr>
      <td><b>Adresse postale : </b></td>
    </tr>
    <tr>
      <td><b>Téléphone : </b><?= preg_replace('/(\d{2})(?=\d)/', '$1 ', $data->EtudiantTel) ?></td>
    </tr>
    <tr>
      <td><b>Mél : </b><?= $data->EtudiantEmail ?></td>
    </tr>
  </table>

  <div class="page-break"></div>
  <h2>TITRE I : Dispositions générales</h2>

  <p><strong>Article 1 (objet) :</strong></p>
  <p>La présente convention a pour objet la mise en œuvre, au bénéfice des étudiants du lycée, d’une action d’éducation concertée, organisée, conformément aux dispositions du décret n°2006-1093 du 29 août 2006, modifié par le décret n°2010-956 du 25 août 2010, pris en application de l’article 9 de la loi n°2006-396 du 31 mars 2006 pour l’égalité des chances. Si le stage se déroule à l’étranger, la convention pourra être adaptée pour tenir compte des contraintes imposées par la législation du pays d’accueil.</p>

  <p><strong>Article 2 (programme) :</strong></p>
  <p>Les stages sont destinés à donner à l’étudiant une représentation concrète du milieu professionnel des services informatiques et de l’emploi, tout en lui permettant d’acquérir et d’éprouver les compétences professionnelles prévues par le référentiel. Le programme du stage est établi par le chef d’entreprise. Le contenu de ce projet est soumis à l’approbation de l’équipe pédagogique, en fonction du programme général des études et de la spécialisation du stagiaire.</p>
  <p>Le sujet proposé est obligatoirement décrit sommairement ci-après :</p>
  <table>
    <TR>
      <TD>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </TD>
    </TR>
  </TABLE>
  <p>En cas de besoin, il fait l’objet d’une annexe qui le décrit de façon détaillée.</p>

  <p><strong>Article 3 (durée) :</strong></p>
  <p>Le stage est fixé aux dates suivantes : du <b><?= $fmt->format(strtotime($data->dateDebut)); ?></b> au <b><?= $fmt->format(strtotime($data->dateFin)); ?> </b>inclus.</p>
  <p><strong>Article 4 (statut du stagiaire) :</strong></p>
  <p>Le stagiaire, pendant la durée de son séjour en entreprise, conserve son statut d’étudiant. Il est suivi par un directeur de stage, en accord formel avec le chef d’entreprise d’accueil.</p>

  <p><strong>Article 5 (assiduité et discipline) :</strong></p>
  <p>Durant son stage, le stagiaire est soumis à la discipline de l’entreprise, notamment en ce qui concerne l’horaire. En cas de manquement à la discipline, le chef d’entreprise peut mettre fin au stage, après avoir prévenu le chef d’établissement. Avant son départ, le chef d’entreprise s’assurera que l’avertissement a bien été reçu par ce dernier, et, s’il s’agit d’un stagiaire logé par l’entreprise, que toutes dispositions ont été prises pour le recevoir.</p>

  <p><strong>Article 6 (accidents) :</strong></p>
  <p>Les étudiants bénéficient de la législation sur les accidents du travail, en application de l’article 410, 2e,1er paragraphes du code de la Sécurité Sociale.<br>
    Toutefois il leur est conseillé de contracter eux-mêmes, ou par l’intermédiaire de leur représentant légal, une assurance garantissant leur responsabilité civile pour tout dommage qu’ils pourraient causer à autrui de leur propre fait.<br>
    En cas d’accident survenant à l’étudiant stagiaire, soit au cours du travail, soit au cours du trajet, le Chef d’Entreprise s’engage à faire parvenir toutes les déclarations, le plus rapidement possible à Monsieur le Proviseur ; il utilise à cet effet, les imprimés spéciaux mis à sa disposition par le Lycée. Le chef d’entreprise contractera une assurance, garantissant sa propre responsabilité civile, chaque fois qu’elle sera engagée.</p>

  <p><strong>Article 7 (rémunération) :</strong></p>
  <p>Le stage ne pourra être considéré comme une période d’activité salariée. Le stagiaire ne perçoit aucune rémunération et est exclu du bénéfice des avantages sociaux et salariés. En cas d’engagement ultérieur, la période du stage ne sera pas prise en compte au titre de l’ancienneté.</p>

  <p><strong>Article 8 (avantages en nature) :</strong></p>
  <p>L’ensemble des frais occasionnés, hors mission spécifique confiée au stagiaire par l’entreprise pendant le déroulement de ce stage, reste à l’entière charge du stagiaire.</p>

  <p><strong>Article 9 (Attestation) :</strong></p>
  <p>En fin de stage, une attestation est remise au stagiaire par le responsable de l'organisation d'accueil. Elle précise les dates et durée effectives du stage ainsi que l'éventuelle gratification versée au stagiaire.</p>
  <p>Cette attestation de stage constitue un document d'examen.
    Le modèle, publié par la circulaire nationale d'organisation du BTS SIO, doit être impérativement utilisé. Ce modèle d'attestation est mis à disposition des étudiants par l'équipe pédagogique. </p>

  <p><strong>Article 10 (confidentialité) :</strong></p>
  <p>Les étudiants stagiaires sont tenus à une obligation de discrétion absolue. A cet égard l’étudiant s’engage à ne divulguer à qui que ce soit aucune information ou donnée à caractère confidentiel qu’il sera en mesure de connaître lors de son stage. L’étudiant doit respecter les biens matériels de l’entreprise en matière de logiciel, l’étudiant s’engage à ne commettre aucune infraction informatique :</p>
  <ul>
    <li> - Piratage de logiciel</li>
    <li> - Dégradation volontaire de données</li>
    <li> - Intrusion de virus</li>
  </ul>
  <p>En cas de non respect de l’une des obligations citées ci-dessus, le chef d’entreprise se réserve le droit de mettre fin au stage de l’étudiant fautif après avoir prévenu le chef d’établissement. Dans le cas d’une faute grave (acte de malveillance dûment constaté) des poursuites pénales pourront être engagées.</p>

  <p><strong>Article 11 (visite) :</strong></p>
  <p>Une visite en entreprise sera réalisée par un enseignant durant la période de stage. Elle fera l’objet d’un entretien entre le tuteur de stage et l’enseignant concerné.</p>

  <h2>TITRE II : Dispositions particulières</h2>

  <h3>Article 1 :</h3>
  <p>L’étudiant en stage ne peut prétendre à aucune rémunération.</p>
  <p>Toutefois, certaines entreprises accordent une gratification aux stagiaires en fonction du sérieux de leur travail et de la qualité des services rendus.</p>

  <p><strong>Article 2 :</strong></p>
  <p>L’étudiant est suivi durant son stage par un professeur. Une visite d’un enseignant aura lieu dans la deuxième partie du stage et sera l’occasion de rencontrer le tuteur du stagiaire qui donnera son avis sur le déroulement du stage et l’implication du stagiaire. En cas de stage éloigné, la visite peut être remplacée par un entretien téléphonique. Le tuteur s’engage à communiquer le plus rapidement à l’enseignant responsable tout problème qui se poserait durant la période de stage.</p>

  <p>Fait en trois exemplaires à Rochefort, le ................</p>

  <table>
    <tr>
      <td width="33%">
        <center>Le chef d’entreprise<p>(Cachet de l’entreprise)</center>
      </td>
      <td width="33%">
        <center>Le proviseur</center>
      </td>
      <td width="33%">
        <center>Le stagiaire ou son représentant légal</center>
      </td>
    </tr>
    <tr>
      <td><br><br><br><br></td>
      <td></td>
      <td></td>
    </tr>
  </table>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
  window.addEventListener('DOMContentLoaded', function() {
    const element = document.querySelector('.section');
    const options = {
      filename: 'convention-<?= isset($data) ? $data->classe . "-" . $data->EtudiantNom . "-" . $data->EtudiantPrenom : "stage" ?>.pdf',
      image: {
        type: 'jpeg',
        quality: 0.98
      },
      html2canvas: {
        scale: 2
      },
      jsPDF: {
        unit: 'pt',
        format: 'a4',
        orientation: 'portrait'
      },
      margin: [40, 20, 40, 20], // Adjust bottom margin for page number
      pagebreak: {
        mode: ['avoid-all', 'css', 'legacy']
      },
    };

    html2pdf().from(element).set(options).toPdf().get('pdf').then(function(pdf) {
      const totalPages = pdf.internal.getNumberOfPages();
      const pageWidth = pdf.internal.pageSize.getWidth();
      const pageHeight = pdf.internal.pageSize.getHeight();

      pdf.setFontSize(10);

      for (let i = 1; i <= totalPages; i++) {
        pdf.setPage(i);
        pdf.text('Page ' + i + ' sur ' + totalPages, pageWidth / 2, pageHeight - 20, {
          align: 'center'
        });
      }
    }).save();
  });
</script>