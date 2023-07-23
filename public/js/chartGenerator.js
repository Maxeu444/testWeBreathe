const lineCanvas = document.getElementById("lineCanvas");

// Récupérer les données JSON depuis l'attribut 'data-chart-data'
const chartData = JSON.parse(lineCanvas.getAttribute('data-chart-data'));

// Utilisez les données pour construire le graphique
if (chartData) {
    const labels = chartData.map(entry => new Date(entry.label).toLocaleString()); // Formatage des libellés en chaînes de caractères lisible
    const values = chartData.map(entry => entry.value);

    const lineChart = new Chart(lineCanvas, {
        type: "line",
        data: {
            labels: labels,
            datasets: [{
                data: values,
            }]
        }
    });
}