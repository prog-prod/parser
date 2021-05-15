/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
window.Vue = Vue;

import router from './routes';
import { store } from './store';

require('./bootstrap');
require('./components');
require('./packages');

const app = new Vue({
    store,
    router
}).$mount('#app');

const token = localStorage.getItem('Bearer')
if (token) {
  axios.defaults.headers.common['Authorization'] = 'Bearer '+token
}
