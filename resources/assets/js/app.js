/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueI18n from 'vue-i18n'

Vue.use(VueI18n);

import {ServerTable, ClientTable, Event} from 'vue-tables-2';

Vue.use(ClientTable);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('validation-message', require('./components/ValidationMessage.vue'));
Vue.component('settings', require('./components/settings/Settings.vue'));
Vue.component('profiles-list', require('./components/profiles/List.vue'));
Vue.component('profiles-form', require('./components/profiles/Form.vue'));

// Ready translated locale messages
const messages = {
  en: window.translationMessages,
};

// Create VueI18n instance with options
const i18n = new VueI18n({
  locale: 'en', // set locale
  messages, // set locale messages
});

// Create a Vue instanc with `i18n` option
// new Vue({ i18n }).$mount('#app');

const app = new Vue({
  el: '#app',
  i18n,
});
