import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueTheMask from "vue-the-mask";
Vue.use(VueTheMask);

import * as uiv from "uiv";
Vue.use(uiv);

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

