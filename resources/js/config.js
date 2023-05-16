import { ref } from 'vue'

export default function useApi() {

    const errors = ref('')

    const index = async (endpoint, params) => {
        return await axios.get(endpoint, { params })
            .then(function (response) {
                return response.data
            })
            .catch(function (error) {
                error.message
            });
    }

    const show = async (endpoint, parameter) => {

        return await axios.get(endpoint + '/' + parameter)
            .then(function (response) {
                return response.data
            })
            .catch(function (error) {
                return error.message
            })

    }

    const store = async (endpoint, data) => {
        errors.value = ''
        return await axios.post(endpoint, data)
            .then(function (response) {
                return response.data
            })
            .catch(function (e) {
                if(e.response.status === 422) {
                    errors.value = e.response.data.errors
                }
            })
    }

    const update = async (endpoint, parameter, data) => {
        errors.value = ''
        return await axios.put(endpoint + '/' + parameter, data)
            .then(function (response) {
                return response.data
            })
            .catch(function (e) {
                if(e.response.status === 422) {
                    errors.value = e.response.data.errors
                }
            })
    }

    const destroy = async (endpoint, parameter) => {
        return await axios.delete(endpoint + '/' + parameter)
            .then(function (response) {
                return response.data
            })
            .catch(function (error) {
                return error.message
            })
    }

    function colorPallete(baseColor, length) {
        // const baseColor = [Math.floor(Math.random() * 256), Math.floor(Math.random() * 256), Math.floor(Math.random() * 256)];
        const colors = [];

        for (let i = 0; i < length; i++) {
            const color = [
                baseColor[0] + Math.floor(Math.random() * 50) - 25,
                baseColor[1] + Math.floor(Math.random() * 50) - 25,
                baseColor[2] + Math.floor(Math.random() * 50) - 25
            ];

            const colorString = `#${color.map(c => Math.max(0, Math.min(255, c)).toString(16).padStart(2, '0')).join('')}`;
            colors.push(colorString);
        }
        return colors;
    }

    function randomColor(length) {
        const colors = [];
        for (let i = 0; i < length; i++) {
            const baseColor = [Math.floor(Math.random() * 256), Math.floor(Math.random() * 256), Math.floor(Math.random() * 256)];
            const color = [
                baseColor[0] + Math.floor(Math.random() * 50) - 25,
                baseColor[1] + Math.floor(Math.random() * 50) - 25,
                baseColor[2] + Math.floor(Math.random() * 50) - 25
            ];
            const colorString = `#${color.map(c => Math.max(0, Math.min(255, c)).toString(16).padStart(2, '0')).join('')}`;
            colors.push(colorString);
        }
        return colors;
    }

    function darkerColors(colors, amount) {
        const result = [];
        for (const color of colors) {
          let r = parseInt(color.slice(1, 3), 16);
          let g = parseInt(color.slice(3, 5), 16);
          let b = parseInt(color.slice(5), 16);
          r = Math.max(0, r - amount);
          g = Math.max(0, g - amount);
          b = Math.max(0, b - amount);
          const newColor = `#${r.toString(16)}${g.toString(16)}${b.toString(16)}`;
          result.push(newColor);
        }
        return result;
      }

    function setChartOptions(chartType) {
        const mdScreen = window.innerWidth >= 768
        if(chartType == 'bar' || chartType == 'line') {
            return {
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
        } else {
            return {
                responsive: true,
                maintainAspectRatio: false
            }
        }

    }

    return {
        index,
        show,
        store,
        update,
        destroy,
        colorPallete,
        darkerColors,
        randomColor,
        errors,
        setChartOptions
    }
}
