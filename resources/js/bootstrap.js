import * as Popper from '@popperjs/core';
window.Popper = Popper;

import 'bootstrap';
import '../scss/app.scss';
import '@fortawesome/fontawesome-free/js/all.js';
import axios from 'axios';
import Chart from 'chart.js/auto';
import jQuery from 'jquery';

window.$ = jQuery;
window.axios = axios;
window.Chart = Chart;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = 'http://dynamic-library.test/api/';

