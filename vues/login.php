<?php
$error_message = "";
if(isset($_GET['erreur'])){
    $error_message = $_GET['erreur'];
}
?>

<style>
    .button-flying {
      position: absolute;
      bottom: 40%;
      right: 20%;
    }
  </style>

<div class="columns is-centered" style="height: 100vh; align-items: center;">
    <div class="column is-one-quarter">

    <form class="box container" action="../controller/login.php" method="post" style="outline: 1px; outline-color: #1d213b;">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="136 136 240 240">
        <!-- Noyau central -->
        <linearGradient id="centerGradient" gradientUnits="userSpaceOnUse" x1="204" y1="250" x2="308" y2="250">
            <stop offset="0" style="stop-color:#3273dc" />
            <stop offset="1" style="stop-color:#3273dc" />
        </linearGradient>
        <circle cx="256" cy="256" r="20" style="fill:url(#centerGradient)" />

        <!-- Orbite 1 -->
        <linearGradient id="orbit1Gradient" gradientUnits="userSpaceOnUse" x1="49.64" y1="250" x2="474.36" y2="250">
            <stop offset="0" style="stop-color:#3273dc" />
            <stop offset="1" style="stop-color:#3273dc" />
        </linearGradient>
        <circle cx="256" cy="256" r="60" style="fill:none;stroke:url(#orbit1Gradient);stroke-width:0.5;stroke-dasharray:4,2;stroke-miterlimit:10" />
        <circle cx="316" cy="256" r="8" style="fill:url(#orbit1Gradient)">
            <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 256 256" to="360 256 256" dur="3s" repeatCount="indefinite" />
        </circle>

        <!-- Orbite 2 -->
        <linearGradient id="orbit2Gradient" gradientUnits="userSpaceOnUse" x1="49.64" y1="250" x2="474.36" y2="250">
            <stop offset="0" style="stop-color:#3273dc" />
            <stop offset="1" style="stop-color:#3273dc" />
        </linearGradient>
        <circle cx="256" cy="256" r="80" style="fill:none;stroke:url(#orbit2Gradient);stroke-width:0.5;stroke-dasharray:4,2;stroke-miterlimit:10" />
        <circle cx="336" cy="256" r="7" style="fill:url(#orbit2Gradient)">
            <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 256 256" to="360 256 256" dur="6s" repeatCount="indefinite" />
        </circle>

        <!-- Orbite 3 -->
        <linearGradient id="orbit3Gradient" gradientUnits="userSpaceOnUse" x1="49.64" y1="250" x2="474.36" y2="250">
            <stop offset="0" style="stop-color:#3273dc" />
            <stop offset="1" style="stop-color:#3273dc" />
        </linearGradient>
        <circle cx="256" cy="256" r="100" style="fill:none;stroke:url(#orbit3Gradient);stroke-width:0.5;stroke-dasharray:4,2;stroke-miterlimit:10" />
        <circle cx="356" cy="256" r="6" style="fill:url(#orbit3Gradient)">
            <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 256 256" to="360 256 256" dur="10s" repeatCount="indefinite" />
        </circle>
        </svg>

        <fieldset>
        <?php if ($error_message != "") : ?>
            <div class="field">
            <div class="notification is-danger">
                <?php echo $error_message; ?>
            </div>
            </div>
        <?php endif; ?>
        <BR>

        <!--<legend class="">Connexion</legend> -->


        <div class="field">
            <div class="control has-icons-left">
            <input id="login" name="login" class="input" type="text" placeholder="Utilisateur">
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
            </div>
        </div>
        <div class="field">
            <div class="control has-icons-left">
            <input id="password" name="password" class="input" type="password" placeholder="Mot de passe">
            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
            </div>
        </div>
        <div class="field">
            <div class="control">
            <button class="button is-link is-fullwidth" type="submit" value="Connection">Connection</button>
            </div>
        </div>

        </fieldset>

        <br>
        <p class="has-text-centered"><strong>BTS SIO</strong> - Lycée Merleau Ponty</p>
    </form>
    </div>
</div>