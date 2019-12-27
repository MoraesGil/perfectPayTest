
import Vue from "vue";

import * as uiv from "uiv";
import locale from "uiv/src/locale/lang/pt-BR";

Vue.use(uiv, { locale });

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common["Content-Type"] = "application/json";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

import App from "./views/App";

const app = new Vue({
    el: "#app",
    components: { App }
});
