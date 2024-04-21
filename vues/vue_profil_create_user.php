<?php
require_once 'config/auth.php';
?>

<H2> Création profil </H2>

<form action="../controller/create_user.php" method="post">
     <label for="nom">Nom :</label>
     <input type="text" id="nom" name="nom" required><br><br>

     <label for="prenom">Prénom :</label>
     <input type="text" id="prenom" name="prenom" required><br><br>

     <label for="email">Email :</label>
     <input type="email" id="email" name="email"><br><br>

     <label for="telephone">Téléphone :</label>
     <input type="text" id="telephone" name="telephone"><br><br>

     <label for="promo">Promo :</label>
     <input type="text" id="promo" name="promo" value="2024"><br><br>

     <label for="login">Login :</label>
     <input type="text" id="login" name="login" required><br><br>

     <label for="password">Mot de passe :</label>
     <input type="password" id="password" name="password" required><br>
     <span id="password_error" style="color: red;"></span><br>

     <label for="confirm_password">Confirmer le mot de passe :</label>
     <input type="password" id="confirm_password" name="confirm_password" required><br>
     <span id="confirm_error" style="color: red;"></span><br>


     <label for="statut">Statut :</label>
     <select id="statut" name="statut" required>
         <option value="Etudiant">Etudiant</option>
         <option value="Professeur">Professeur</option>
         <!-- Ajoutez d'autres options selon vos besoins -->
     </select><br><br>

     <input type="submit" value="S'inscrire">
 </form>
 <SCRIPT>
 // Sélectionnez les champs de mot de passe
 const passwordField = document.getElementById('password');
 const confirmPasswordField = document.getElementById('confirm_password');
 // Sélectionnez les éléments pour afficher les messages d'erreur
 const passwordError = document.getElementById('password_error');
 const confirmError = document.getElementById('confirm_error');

 // Ajoutez un écouteur d'événement "change" aux champs de mot de passe
 passwordField.addEventListener('change', validatePassword);
 confirmPasswordField.addEventListener('change', validatePassword);

 // Fonction de validation des mots de passe
 function validatePassword() {
     // Récupérez les valeurs des champs de mot de passe
     const passwordValue = passwordField.value;
     const confirmPasswordValue = confirmPasswordField.value;

     // Vérifiez si les valeurs des champs de mot de passe sont identiques
     if (passwordValue !== confirmPasswordValue) {
         // Affichez un message d'erreur si les mots de passe ne correspondent pas
         confirmError.textContent = "Les mots de passe ne correspondent pas";
     } else {
         // Effacez le message d'erreur si les mots de passe correspondent
         confirmError.textContent = "";
     }
 }

 </script>
