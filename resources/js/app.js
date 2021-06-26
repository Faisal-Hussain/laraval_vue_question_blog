/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import {Vue} from "vue/types/vue";

require('./bootstrap');


window.Vue = require('vue');
// src/plugins/vuetify.js

import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import VueSimplemde from 'vue-simplemde'
import 'simplemde/dist/simplemde.min.css'

Vue.component('vue-simplemde', VueSimplemde)
Vue.use(VueSimplemde)
Vue.use(Vuetify)

import User from "./components/Helpers/User"
window.User=User
window.EventBus=new Vue
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import md from "marked";
window.Use=md
dayjs.extend(relativeTime);



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app-home', require('./components/AppHome.vue').default);
// Vue.component('signup', require('./components/Signup.vue'));
// Vue.component('login', require('./components/Login.vue'));
// Vue.component('example-component', require('./components/Examplecomponent.vue').default);

import router from "./components/router/router";
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router

});
