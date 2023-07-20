// public/js/generate_data.js
document.addEventListener('DOMContentLoaded', function () {
    function generateRandomData() {
      // Génère une valeur aléatoire pour le taux de remplissage (entre 0 et 1)
      const fillRate = Math.random();
      
      // Récupère l'ID du module à partir de l'URL
      const moduleId = window.location.pathname.split('/').pop();
      
      // Envoie la valeur aléatoire au serveur via une requête AJAX
      fetch(`/module/${moduleId}/${fillRate}`, { method: "POST" })
        .then(response => response.json())
        .then(data => {
          console.log(data); // Affiche la réponse du serveur (facultatif)
        })
        .catch(error => {
          console.error('Une erreur s\'est produite lors de l\'envoi des données :', error);
        });
    }
  
    // Appelle la fonction generateRandomData toutes les 15 secondes
    setInterval(generateRandomData, 15000);

    setTimeout(function(){
      window.location.reload(1);
   }, 15000);
  });
  





































// const dataMapping = {
//     fillRate: 'taux_remplissage',
//     isWorking: 'etat'
//   };
  
//   // Fonction pour envoyer les données de mesure au serveur
//   function sendMeasurementData() {
//     var fillRate = generateFillRate();
//     var isWorking = isModuleWorking();
  
//     // Crée l'objet contenant les données de mesure
//     var measurementData = {
//       [dataMapping.fillRate]: fillRate,
//       [dataMapping.isWorking]: isWorking
//     };
  
//     // Envoie les données au serveur uniquement si le module est fonctionnel
//     if (isWorking) {
//       fetch('/api/measurement', {
//         method: 'POST',
//         headers: {
//           'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(measurementData)
//       })
//       .then(response => response.json())
//       .then(data => {
//         console.log(data); // Affiche le message de succès dans la console
//       })
//       .catch(error => {
//         console.error('Error:', error); // Affiche l'erreur dans la console en cas d'échec
//       });
//     }
  
//     // Répète l'envoi des données de mesure toutes les 15 secondes
//     setTimeout(sendMeasurementData, 30000); // 30 secondes = 30000 millisecondes
//   }
  
//   // Démarre l'envoi des données de mesure
//   sendMeasurementData();