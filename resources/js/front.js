require('./bootstrap');

window.Vue = require('vue');
window.Axios = require('axios');

import App from './components/App.vue';

const root = new Vue({
    el: '#root',
    render: h => h(App),
});