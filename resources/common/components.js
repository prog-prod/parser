import Vue from 'vue';

// Example
Vue.component('app-header', () => import('./components/Dashboard/Parts/HeaderComponent.vue'));
Vue.component('app-footer', () => import('./components/Dashboard/Parts/FooterComponent.vue'));
Vue.component('main-component', () => import('./components/Dashboard/MainComponent.vue'));
Vue.component('error-404', () => import('./components/Dashboard/Errors/404Component.vue'));
Vue.component('error-403', () => import('./components/Dashboard/Errors/403Component.vue'));
