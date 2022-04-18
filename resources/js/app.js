require('./bootstrap');

import Vue from 'vue';

Vue.component('books-list', require('./components/BooksList.vue').default);

const app = new Vue({
    el: '#app',
});
