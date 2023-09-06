import * as Popper from '@popperjs/core';
window.Popper = Popper;

import 'bootstrap';
import '../scss/app.scss';
import '@fortawesome/fontawesome-free/js/all.js';

import { createApp } from 'vue';
import router from './Vue/Scripts/router.js'
import App from './Vue/App.vue'

import axios from 'axios';
import Chart from 'chart.js/auto';

window.axios = axios;
window.Chart = Chart;

const app = createApp(App)
app.use(router)
app.mount('#app')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.Accept = 'application/json'
window.axios.defaults.headers.common['X-Api-Key'] = import.meta.env.VITE_API_KEY;
window.axios.defaults.baseURL = import.meta.env.DEV ? 'https://lib.furkanaymergen.dev/api/' : 'http://dynamic-library.test/api/';
console.log(import.meta.env.PROD ? 'Production' : 'Dev')
