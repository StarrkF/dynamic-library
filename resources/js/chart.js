var data = {
    labels: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz"],
    datasets: [
      {
        label: "Kitap",
        backgroundColor: "rgba(75,192,192,0.4)",
        borderColor: "rgba(75,192,192,1)",
        borderWidth: 1,
        data: [65, 59, 80, 81, 56, 55, 40]
      }
    ]
  };
  var ctx = document.getElementById('myChart');

  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  };
  var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });
