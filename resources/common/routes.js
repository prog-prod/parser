import Vue from 'vue';
import VueRouter from 'vue-router';
import { store } from './store';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes : [
        {
            path: '/login',
            component: () => import('./components/Auth/LoginComponent.vue'),
            meta: { guest: true, admin: false },
            name: 'auth.login'
        },
        {
            path: '/register',
            component: () => import('./components/Auth/RegisterComponent.vue'),
            meta: { guest: true, admin: false },
            name: 'auth.register'
        },
        {
            path: '/reset-password',
            component: () => import('./components/Auth/ResetPasswordComponent.vue'),
            meta: { guest: true, admin: false }
        },
        {
            path: '/dashboard/stocks',
            component: () => import('./components/Dashboard/DashboardComponent.vue'),
            meta: { guest: false, admin: false },
            name: 'dashboard'
        },
        {
            path: '/dashboard/stocks/:id',
            component: () => import('./components/Dashboard/Stock/StockComponent.vue'),
            meta: { guest: false, admin: false },
            name: 'dashboard.stocks.show'
        },
        {
            path: '/dashboard/logout',
            component: () => {
                store.dispatch('logout');
                window.location.href = '/';
            },
            meta: { guest: false, admin: false },
            name: 'dashboard.logout'
        },
        {
            path: '/dashboard/profile',
            component: () => import('./components/Dashboard/User/ProfileComponent.vue'),
            meta: { guest: false, admin: false },
            name: 'dashboard.profile'
        },
        { path: "*", component: () => import('./components/Dashboard/Errors/404Component.vue') },
    ]
});

// Middleware
router.beforeEach(
    (to, from, next) => {
        if (to.matched.some(record => record.meta.guest === false)) {
            if (to.meta.admin && ! store.getters.isLoggedIn) {
                // If the ADMIN is not logged in - push him to login page
                next({ path: '/admin/login' });
            } else if ( ! store.getters.isLoggedIn) {
                // If the USER is not logged in - push him to login page
                next({ path: '/login' });
            } else {
                // update user data in every request
                store.dispatch('updateUserData').then((response) => {
                    if (response.result === true) {
                        next();
                    } else {
                        next({name: 'auth.login'});
                    }
                });
            }
        } else if (to.matched.some(record => record.meta.guest === true) && store.getters.isLoggedIn) {
            next({name: 'dashboard'});
        } else if (to.matched.some(record => record.meta.guest)) {
            next();
        } else {
            next();
        }
    }
);

export default router;
