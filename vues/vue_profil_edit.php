<?php
require_once 'config/auth.php';

if($Profil):?>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-three-quarters">
      <h1 class="title is-1 has-text-centered">Modification profil</h1>
      <h1 class="subtitle is-3 has-text-centered"><?= $Profil->nom?> <?= $Profil->prenom ?></h1>

      <form action="/controller/profil_update.php" method="post">
        <input type="hidden" name="id" id="id" value=<?= $Profil->id?>>

        <div class="assemble">
          <div class="field" style="width: 100%;">
            <label class="label" for="email">Email</label>
            <div class="control">
              <input type="text" class="input" placeholder="alicedupont@email.com" name="email" id="email" value=<?= $Profil->email?>>
            </div>
          </div>

          <div class="field" style="width: 100%;">
          <label class="label" for="email">Téléphone</label>
            <div class="control">
              <input type="text" class="input" placeholder="06 00 00 00 00" name="telephone" id="telephone" value="<?= $Profil->telephone?>">
            </div>
          </div>
        </div>

        <div class="field">
          <div class="control">
            <button class="button is-primary" id="submitForm">Modifier</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

<?php endif;?>