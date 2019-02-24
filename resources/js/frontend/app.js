
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import '../bootstrap';
import '../plugins';


import Vue from 'vue';
import VueApexCharts from 'vue-apexcharts'


import NProgress from 'nprogress'
import 'nprogress/nprogress.css'
axios.interceptors.request.use(function (config) {
    //do something before request is sent
    NProgress.start();
    return config;
},function (error) {
    //Do something with request error
    console.error(error)
    return Promise.reject(error);

});

//Add a response interceptor
axios.interceptors.response.use(function (response) {
    //do something with resposnse data
    NProgress.done();
    return response;
}, function (error) {
    // do something with the response error
    console.error(error)
    return Promise.reject(error);
});
/*$(document ).ajaxSend(function(event,request,settings){
console.log(1);
NProgress.start();
});*/
$(document ).ajaxComplete(function(event,request,settings){
    console.log(2);
    NProgress.done();
});
$(document ).ajaxStart(function(){
    NProgress.start();
});




import { Chart } from "frappe-charts"
Vue.use(VueApexCharts)
window.Vue = Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('skus-component', require('./components/SkusComponent.vue'));
Vue.component('apexchart', VueApexCharts);
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('product-table-component', require('./components/ProductTableComponent.vue'));
Vue.component('product-form', require('./components/ProductForm.vue'));
Vue.component('ptable', require('./components/ptable.vue'));
Vue.component('product-filter', require('./components/ProductFilterComponent.vue'));
Vue.component('product-filter-draft', require('./components/ProductFilterComponent_drafttt.vue'));
Vue.component('chart-testing', require('./components/graphs/testing.vue'));
Vue.component('p-filter', require('./components/dashboard/PFilterComponent.vue'));
Vue.component('product-table', require('./components/dashboard/ProductTableComponent.vue'));
Vue.component('raw-filter', require('./components/dashboard/RawPFilter.vue'));
Vue.component('graph-component-test', require('./components/GraphComponent.vue'));
Vue.component('graph-component-test1', require('./components/graphs/GraphComponent.vue'));
Vue.component('graph-component-test2', require('./components/graphs/GraphComponent2.vue'));
Vue.component('stacked-bar', require('./components/graphs/StackedBarComponent_backup.vue'));
// Vue.component('vue-frappe', require('./node_modules/vue2-frappe'));
// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',


});