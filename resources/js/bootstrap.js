import axios from 'axios';
window.axios = axios;

window.axios.defaults.url = 'http://localhost';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
