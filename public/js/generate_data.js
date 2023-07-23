// public/js/generate_data.js

console.log("salut");

document.addEventListener("DOMContentLoaded", function () {
  function generateRandomData() {
    const fillRate = Math.floor(Math.random() * 101);

    const moduleId = window.location.pathname.split("/").pop();

    fetch(`/module/${moduleId}/${fillRate}`, { method: "POST" })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.error(
          "Une erreur s'est produite lors de l'envoi des données :",
          error
        );
      });
  }

  setInterval(generateRandomData, 15000);

  setTimeout(function () {
    window.location.reload(1);
  }, 15000);
});
