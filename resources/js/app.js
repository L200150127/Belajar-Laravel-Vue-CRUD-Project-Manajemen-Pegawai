
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router';
// import moment from 'moment';

Vue.use(VueRouter);

import Vueaxios from 'vue-axios';
import axios from 'axios';

Vue.use(Vueaxios, axios);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import App from './components/App.vue';
import Home from './components/Home.vue';

import JabatanIndex from './components/JabatanIndex.vue';
import JabatanCreate from './components/JabatanCreate.vue';
import JabatanEdit from './components/JabatanEdit.vue';

import PegawaiIndex from './components/PegawaiIndex.vue';
import PegawaiCreate from './components/PegawaiCreate.vue';
import PegawaiEdit from './components/PegawaiEdit.vue';

Vue.filter('capitalize', function (value) {
  if (!value) return ''
  value = value.toString()
  return value.charAt(0).toUpperCase() + value.slice(1)
});
Vue.filter('gender', function (value) {
  if (!value) return ''
  value = value.toString().toLowerCase();
  return (value == 'l') ? 'Laki-laki' : 'Perempuan';
});
Vue.filter('date', function(value) {
    Moment.locale('id');
    return Moment(value).format('Do MMMM YYYY');
});
// Vue.filter('date', function (value) {
//   if (!value) return ''
//   value = value.toString()
//   return value.charAt(0).toUpperCase() + value.slice(1)
// });


// Vue.component('home', require('./components/Home.vue'));

const routes = [
	{name: 'home', path: '/', component: Home},
	{name: 'jabatan', path: '/jabatan', component: JabatanIndex},
	{name: 'jabatantambah', path: '/jabatan/tambah', component: JabatanCreate},
	{name: 'jabatanedit', path: '/jabatan/edit/:id', component: JabatanEdit},
	{name: 'pegawai', path: '/pegawai', component: PegawaiIndex},
	{name: 'pegawaitambah', path: '/pegawai/tambah', component: PegawaiCreate},
	{name: 'pegawaiedit', path: '/pegawai/edit/:id', component: PegawaiEdit}
];

const router = new VueRouter({
	mode: 'history',
	routes
});

new Vue(Vue.util.extend({ router }, App)).$mount('#app');
