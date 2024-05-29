if (window.opener == null || typeof(window.opener.postMessage) == "undefined") {
  //redeirect to the accueing location
  window.location.href = "http://gestage.local/";
}

function sendResponse(response, host){
  window.opener.postMessage(response, host);
}

window.addEventListener("unload", function() {
  sendResponse({statut: "cancel"}, "http://gestage.local/");
  window.close();
});



