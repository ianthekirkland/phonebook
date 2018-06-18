
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
