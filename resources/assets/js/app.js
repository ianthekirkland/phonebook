
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/**
 * Bulma
 *
 * @note This is referring to the default-included bootstrap.js (no need to change yet).
 * @see  ./bootstrap.js
 * @see  https://www.youtube.com/watch?v=z1ZvmV0E2Ns&list=PLe30vg_FG4OSl8zlikYc_RLkfueqAMUb_&index=2
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueShortkey from 'vue-shortkey';

Vue.use(VueRouter);
Vue.use(VueShortkey);


// Vue.component('example-component', require('./components/ExampleComponent.vue'));
let Myheader = require('./components/Myheader.vue');
let Myfooter = require('./components/Myfooter.vue');
let Home = require('./components/Home.vue');
let About = require('./components/About.vue');
let Add = require('./components/Add.vue');

// routes
const routes = [
    { path: '/home', component: Home },
    { path: '/about', component: About }
];

// router
const router = new VueRouter({
    // mode: 'history', // Eliminates URL '#' (?) and attempts to refresh same route
    routes // short for `routes: routes`
});

const app = new Vue({
    el: '#app',
    router,
    created() {
        console.log('This is a creation lifecyle hook');
    },
    components: { Myheader, Myfooter, Add } // Shouldn't this include 'Home.vue'? Probably not, since Home is bound to a route
});
