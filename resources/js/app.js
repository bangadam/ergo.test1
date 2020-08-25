/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('app-component', require('./components/AppComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/AppComponent.vue';
import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);

import BarangIndex from './components/Barang/IndexComponent.vue';
import BarangCreate from './components/Barang/CreateComponent.vue';
import BarangShow from './components/Barang/ShowComponent.vue';
import BarangEdit from './components/Barang/EditComponent.vue';

import PemilikIndex from './components/Pemilik/IndexComponent.vue';
import PemilikCreate from './components/Pemilik/CreateComponent.vue';
import PemilikShow from './components/Pemilik/ShowComponent.vue';
import PemilikEdit from './components/Pemilik/EditComponent.vue';

import TransaksiIndex from './components/Transaksi/IndexComponent.vue';
import TransaksiCreate from './components/Transaksi/CreateComponent.vue';
import TransaksiShow from './components/Transaksi/ShowComponent.vue';
import TransaksiEdit from './components/Transaksi/EditComponent.vue';

const routes = [
    {
        name: 'barang',
        path: '/barang',
        component: BarangIndex
    },
    {
        name: 'barang.create',
        path: '/barang/create',
        component: BarangCreate
    },
    {
        name: 'barang.edit',
        path: '/barang/:id/edit',
        component: BarangEdit
    },
    {
        name: 'barang.show',
        path: '/barang/:id/show',
        component: BarangShow
    },

    {
        name: 'pemilik',
        path: '/pemilik',
        component: PemilikIndex
    },
    {
        name: 'pemilik.create',
        path: '/pemilik/create',
        component: PemilikCreate
    },
    {
        name: 'pemilik.edit',
        path: '/pemilik/:id/edit',
        component: PemilikEdit
    },
    {
        name: 'pemilik.show',
        path: '/pemilik/:id/show',
        component: PemilikShow
    },

    {
        name: 'transaksi',
        path: '/transaksi',
        component: TransaksiIndex
    },
    {
        name: 'transaksi.create',
        path: '/transaksi/create',
        component: TransaksiCreate
    },
    {
        name: 'transaksi.edit',
        path: '/transaksi/:id/edit',
        component: TransaksiEdit
    },
    {
        name: 'transaksi.show',
        path: '/transaksi/:id/show',
        component: TransaksiShow
    }
];

const router = new VueRouter({mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
