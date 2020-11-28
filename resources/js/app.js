require('./bootstrap');
// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import Vue from 'vue'
import Main from './Main'
import router  from './routes'

import { Form , HasError , AlertError , AlertSuccess } from 'vform'
window.Form = Form ;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertSuccess.name, AlertSuccess)


const app = new Vue({
    el: '#app',
    router ,
    render: h => h (Main)
});
