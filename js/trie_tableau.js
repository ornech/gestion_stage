var valueColonnes = []

function placeFilter(baliseHeader, nameColonne, valueColonnes, numColonne){
  let nomAttachColonne = nameColonne.split(' ').join('');

  baliseHeader.innerHTML += `
    <div class="dropdown is-hoverable"> 
    
      <div class="dropdown-trigger">
        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
          <span>${nameColonne}</span>
          <span class="icon is-small">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
          </span>
        </button>
      </div>

      <div class="dropdown-menu" id="dropdown-menu4" role="menu">
        <div class="dropdown-content">
          <div class="dropdown-item">
            <span class="label is-small">Filtrer</span>
            <input id="Input_${nomAttachColonne}_filtre" value="" onkeyup="searchInColumn(this, '${numColonne}')"  class="input is-small">
            <select id="Select_${nomAttachColonne}_filtre" onchange="applyFilter(this.value, \'${nomAttachColonne}\')" class="select is-small">
              <option value="">Tout afficher</option>

              ${Array.from(new Set(valueColonnes)).map(value => `<option value="${htmlspecialchars(value)}">${htmlspecialchars(value)}</option>`).join('')}

            </select>

            <hr class="dropdown-divider" />
            <label class="label is-small" for="' . $column . '_trie">Trier</label>
            <select id="' . $column . '_trie" onchange="sortTable('${numColonne}', this.value)" class="select is-small" style="width:100%;">
              <option value="">---</option>
              <option value="asc">Croissant</option>
              <option value="desc">Décroissant</option>
            </select>

          </div>
        </div>
      </div>
    </div>
  `;
}

document.addEventListener("DOMContentLoaded", function(){
  let table = document.getElementsByClassName("tableFilter");
  if (!table[0]) return;

  let headers = document.getElementsByClassName("lineFilter");

  Array.from(headers).forEach((header, i) => {
      let nom = header.getAttribute("name") ? header.getAttribute("name") : "Undefined";
      valueColonnes[nom] = [];  // Initialiser le tableau pour cette colonne

      let colonnes = table[0].querySelectorAll(`tbody tr td:nth-child(${i + 1})`);

      colonnes.forEach(colonne => {
          valueColonnes[nom].push(colonne.textContent.toLowerCase());
      });

      placeFilter(header, nom, valueColonnes[nom], i);
  });
});

// Fonction pour appliquer un filtre sur une colonne
function applyFilter(value, column) {
  var table = document.querySelector('table');
  var rows = table.getElementsByTagName('tr');
  for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var cells = row.getElementsByTagName('td');
      var cell = Array.from(cells).find(cell => cell.innerText.toLowerCase() === value);
      row.style.display = (value === '' || cell) ? '' : 'none';
  }
}

// Fonction pour appliquer un tri sur une colonne
function sortTable(n, order) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("maTable");
  switching = true;
  dir = order;

  while (switching) {
      switching = false;
      rows = Array.from(table.rows).filter(row => row.style.display !== "none");

      for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];

          if (dir == "asc") {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                  shouldSwitch = true;
                  break;
              }
          } else if (dir == "desc") {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                  shouldSwitch = true;
                  break;
              }
          }
      }
      if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          switchcount++;
      } else {
          if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
          }
      }
  }
}

// Fonction pour rechercher dans une colonne
function searchInColumn(input, columnIndex) {
  var filter = input.value.toLowerCase();
  var table = document.getElementById("maTable");
  var rows = table.getElementsByTagName("tr");

  for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var cell = row.getElementsByTagName("td")[columnIndex];
      if (cell) {
          var txtValue = cell.textContent || cell.innerText;
          row.style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
      }
  }
}

function htmlspecialchars(str) {
  if (typeof str !== 'string') return str;
  return str.replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
}