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
});
