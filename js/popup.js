if (window.opener == null || typeof(window.opener.postMessage) == "undefined") {
  //redeirect to the accueing location
  window.location.href = window.location.origin;
}

function sendResponse(response){
  window.opener.postMessage(response, window.location.origin);
  window.close();
}

window.addEventListener("beforeunload", function() {
  console.log(window.location)
  sendResponse({statut: "cancel"}, window.location.origin);
  window.close();
});



