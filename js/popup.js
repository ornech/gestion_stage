if (window.opener == null || typeof(window.opener.postMessage) == "undefined") {
  window.location.href = window.location.origin;
}

function sendResponse(response){
  console.log(response)
  window.opener.postMessage(response, window.location.origin);
  window.close();
}
