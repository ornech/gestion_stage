<?php if (!isset($_SESSION)) : ?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Conditions Générales d'Utilisation</title>
    <meta charset="UTF-8">
  </head>

  <body>
  <?php endif; ?>


  <title>Conditions Générales d'Utilisation</title>
  <div class="container">
    <h1 class="title has-text-centered">Conditions Générales d'Utilisation</h1>

    <section class="section">
      <h2 class="subtitle">Introduction</h2>
      <p>Les informations collectées par notre application sont enregistrées dans un système informatisé par <b>O2switch</b> dans le but de fournir et améliorer nos services. La base légale du traitement est le consentement de l'utilisateur.</p>
    </section>

    <section class="section">
      <h2 class="subtitle">Collecte des données</h2>
      <p>Les données collectées peuvent être partagées avec les partenaires techniques et sous-traitants nécessaires au bon fonctionnement de l'application.</p>
    </section>

    <section class="section">
      <h2 class="subtitle">Conservation des données</h2>
      <p>Les données seront conservées aussi longtemps que nécessaire pour atteindre les objectifs mentionnés ci-dessus ou conformément aux exigences légales.</p>
      <p>Vous pouvez accéder à vos données, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données en nous contactant à cette adresse admin@gestage.btssio17.com</p>
      <p>Vous avez également le droit de retirer votre consentement à tout moment. Pour plus d'informations sur vos droits, consultez la politique de confidentialité disponible sur le site de la cnil.</p>
      <p>Pour toute question sur le traitement de vos données ou pour exercer vos droits, veuillez contacter notre délégué à la protection des données à cette adresse admin@gestage.btssio17.com.</p>
    </section>

    <section class="section">
      <h2 class="subtitle">Conclusion</h2>
      <p>Si vous estimez que vos droits « Informatique et Libertés » ne sont pas respectés, vous avez le droit de saisir l'autorité de contrôle compétente conformément à la loi applicable.</p>
    </section>
  </div>

  <style>
    .title,
    .subtitle {
      margin-bottom: 1rem;
    }

    .section {
      padding: 2rem 1.5rem;
    }

    ul,
    ol {
      margin-left: 1.5rem;
    }

    ul li,
    ol li {
      margin-bottom: 0.5rem;
    }
  </style>

  <?php if (!isset($_SESSION)) : ?>
  </body>

  </html>
<?php endif; ?>