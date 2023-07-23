const lineCanvas = document.getElementById("lineCanvas");

// Récupérer les données JSON depuis l'attribut 'data-chart-data'
const chartData = JSON.parse(lineCanvas.getAttribute('data-chart-data'));


if (chartData) {
    const labels = chartData.map(entry => new Date(entry.label).toLocaleString());
    const values = chartData.map(entry => entry.value);

    const options = {
        scales: {
          y: {
            min: 0,   
            max: 100,   
           
          },
        },
      };

    const lineChart = new Chart(lineCanvas, {
        type: "line",
        
        options : options,
        data: {
            
            labels: labels,
            datasets: [{
                label: 'Mesure du taux de remplissage (en %) ',
                data: values,
            }]
        },
        
        
    });
      
}