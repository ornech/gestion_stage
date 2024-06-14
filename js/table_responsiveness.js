addEventListener("DOMContentLoaded", function() {
  // Sélectionner tous les tableaux de la page
  const tableaux = document.querySelectorAll('table');
  const container = document.querySelector('.container');

  // Parcourir chaque tableau
  tableaux.forEach(tableau => {
    // Vérifier si le tableau dépasse de la div container
    if (tableau.offsetWidth > container.offsetWidth) {

      // Créer une div pour contenir le tableau
      const divContainer = document.createElement('div');
      divContainer.classList.add('table-container');

      // Insérer la div avant le tableau
      tableau.parentNode.insertBefore(divContainer, tableau);

      // Déplacer le tableau dans la div
      divContainer.appendChild(tableau);
    }
  });
})