import Vue from 'vue';

// Example
Vue.component('app-header', () => import('./components/Dashboard/Parts/HeaderComponent.vue'));
Vue.component('app-footer', () => import('./components/Dashboard/Parts/FooterComponent.vue'));
