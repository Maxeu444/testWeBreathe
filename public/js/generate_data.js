// // public/js/generate_data.js
// document.addEventListener('DOMContentLoaded', function () {
//     function generateRandomData() {
//       // Génère une valeur aléatoire pour le taux de remplissage (entre 0 et 100)
//       const fillRate = Math.random();
      
//       // Récupère l'ID du module à partir de l'URL
//       const moduleId = window.location.pathname.split('/').pop();
      
//       // Envoie la valeur aléatoire au serveur via une requête AJAX
//       fetch(`/module/${moduleId}/${fillRate}`, { method: "POST" })
//         .then(response => response.json())
//         .then(data => {
//           console.log(data); // Affiche la réponse du serveur (facultatif)
//         })
//         .catch(error => {
//           console.error('Une erreur s\'est produite lors de l\'envoi des données :', error);
//         });
//     }
  
//     // Appelle la fonction generateRandomData toutes les 15 secondes
//     setInterval(generateRandomData, 15000);

//     setTimeout(function(){
//       window.location.reload(1);
//    }, 15000);
//   });