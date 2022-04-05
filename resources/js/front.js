require('./bootstrap');

window.Vue = require('vue');
window.Axios = require('axios');

import App from './components/App.vue';
import router from './routes.js';

const root = new Vue({
    el: '#root',
    router: router,
    render: h => h(App),
});