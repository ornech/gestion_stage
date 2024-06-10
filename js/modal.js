addEventListener("DOMContentLoaded", function() {
  const openModalButton = document.querySelectorAll("#openModal");
  const closeModalButton = document.querySelectorAll("#closeModal");
  
  openModalButton.forEach(openButton => {
    console.log("open button initied");
    openButton.addEventListener("click", event => {
      const targetId = openButton.getAttribute("for");
      const targetElement = document.getElementById(targetId);
      
      if (targetElement) {
        targetElement.classList.add("is-active");
      }
    });
  });
  
  closeModalButton.forEach(closeButton => {
    closeButton.addEventListener("click", event => {
      const targetId = closeButton.getAttribute("for");
      const targetElement = document.getElementById(targetId);
      
      if (targetElement) {
        targetElement.classList.remove("is-active");
      }
    });
  });
})
