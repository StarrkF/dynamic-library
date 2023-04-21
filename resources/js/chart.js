import useConfig from './config';

const { index, show, store, update, destroy, colorPallete, darkerColors, randomColor } = useConfig();
const chartData = {}

const getChart = async () => {
    let response = await index('/chart')
    chartData.value = response
    updateChart()
}

getChart()

const data = {}
const mdScreen = $(window).width() >= 768
const options = {
    scales: {
        y: {
            beginAtZero: true,
        },
        x: {
            ticks: {
                display: mdScreen ? true : false,
                maxRotation: 40,
                minRotation: 40,
                autoSkip: false
            },
            barPercentage: 0.8,
            categoryPercentage: 0.9,
        }
    },
    responsive: true,
    maintainAspectRatio: false
}

function updateChart() {
    data.labels = chartData.value.map(item => item.name);
    const backgroundColors = randomColor(chartData.value.length);
    const borderColors = darkerColors(backgroundColors, 20);
    data.datasets = [{
      label: "Tür / Kitap Sayısı",
      data: chartData.value.map(item => item.books_count),
      backgroundColor: backgroundColors,
      borderColor: '#000',
      borderWidth: 1
    }];
  }

var ctx = document.getElementById('myChart');

var myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options,
});

