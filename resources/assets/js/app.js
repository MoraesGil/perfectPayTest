
import Vue from "vue";

import * as uiv from "uiv";
import locale from "uiv/src/locale/lang/pt-BR";

Vue.use(uiv, { locale });

import VueCurrencyFilter from "vue-currency-filter";

Vue.use(VueCurrencyFilter, {
    symbol: "R$",
    thousandsSeparator: ".",
    fractionCount: 2,
    fractionSeparator: ",",
    symbolPosition: "front",
    symbolSpacing: true
});

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
