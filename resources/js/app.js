require('./bootstrap');
window.Vue = require('vue');

Vue.component('book', require('../components/book.vue').default);

const app = new Vue({
    el: '#app',
});
