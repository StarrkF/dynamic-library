import * as Popper from '@popperjs/core'
window.Popper = Popper

import 'bootstrap'
import '../scss/app.scss'
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

