// Variables
let themeButton;

//Initiation du thème par défaut ou actuel
const default_theme = "light";

//Changement de thème
const setTheme = (theme, save = true) => {
  document.documentElement.setAttribute("data-theme", theme);
  if (save) {
    localStorage.setItem("theme", theme);
  }
  if(themeButton != null) {
    changeButtonIcon(theme); //Fonction changement d'icone
  }
};

if (localStorage.getItem("theme")) {
  setTheme(localStorage.getItem("theme"));
  console.log("Theme sauvegardé " + localStorage.getItem("theme"));
} else {
  setTheme(default_theme, false); //False pour ne pas sauvegarder
  console.log("Theme par défaut");
}

//Lorsque la page est chargé
document.addEventListener("DOMContentLoaded", function() {
  //Ajout du bouton de changement de thème
  const button = document.createElement("button");
  button.className = "button button-flying";
  button.style.position = "fixed";
  button.style.bottom = "4%";
  button.style.right = "2%";
  button.style.zIndex = "1";
  button.style.height = "45px";
  button.style.width = "45px";

  //ajout d'un i pour l'icon sur le bouton
  var icon = document.createElement("i");
  icon.classList.add("fas", "fa-sun", "button-i");
  icon.style.fontSize = "1.25em";
  icon.style.color = "hsl(42 100% 53%)";
  icon.style.transform = "rotate(22.5deg)";

  button.appendChild(icon); //Ajout l'icon dans le bouton

  document.body.appendChild(button); //Ajout du bouton dans body

  themeButton = button; //Attribution du bouton à la variable themeButton

  initButton(); //Lance un addEventListener pour chaque clique sur le bouton après l'initiation.

});

function initButton(){
  themeButton.addEventListener("click", function() {
    if (document.documentElement.getAttribute("data-theme") == "dark") {
      console.log("Attribution du thème light");
      setTheme("light");
    } else {
      console.log("Attribution du thème dark");
      setTheme("dark");
    }
  });
}

function changeButtonIcon(themeSelected){
  let icon = document.getElementsByClassName("button-i")[0];
  if(themeSelected == "light"){
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
    icon.style.color = "hsl(42 100% 53%)";
    icon.style.transform = "rotate(22.5deg)";
  }
  else if(themeSelected == "dark"){
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
    icon.style.color = "hsl(220 100% 53%)";
    icon.style.transform = "rotate(0deg)";
  }
}