
import Vue from "vue";

import * as uiv from "uiv";
import locale from "uiv/src/locale/lang/pt-BR";

Vue.use(uiv, { locale });

import App from "./views/App";

const app = new Vue({
    el: "#app",
    components: { App }
});
