/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VModal from 'vue-js-modal'
import Toasted from 'vue-toasted'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.use(VModal, { dynamic: true, injectModalsContainer: true })
Vue.use(Toasted, {position: 'top-right', duration: 1500, containerClass: 'm-toasted'})


Vue.component('toast', require('./components/toast.vue').default)

/* ============================================================================
 * form
 * ========================================================================= */
Vue.component('search-form', require('./components/form/searchForm.vue').default)

/* ============================================================================
 * button
 * ========================================================================= */
Vue.component('apply-button', require('./components/button/applyButton.vue').default)
Vue.component('favorite-button', require('./components/button/favoriteButton.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({ // eslint-disable-line
    el: '#app',
});
