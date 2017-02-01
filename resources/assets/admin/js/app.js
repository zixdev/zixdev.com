/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap'
import router from './routes';
import store from './store';
import Tablage from '../../../../modules/Core/Assets/admin/js/libraries/tablage';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    template: '<App/>',
    components: {
        App: require('./App.vue')
    },
    router,
    store
}).$mount('#admin')

window['DataTable'] = Tablage(app);

/*
 * App Permissions Middleware
 */
app.$router.beforeEach((route, redirect, next) => {
    if(!Auth.permissions.includes(route.meta.permission)){
        app.$events.$emit('notify', {
            type: 'warning',
            title: 'Warning !',
            message: 'You Don\'t Access To Permission : '  + route.meta.permission.replace('_', ' ').toUpperCase().replace('_', ' ')
        });
        next('/')
    }
    next()
});

