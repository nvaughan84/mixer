require('./bootstrap');

window.Vue = require('vue');

//Vue.component('user-search-component', require('./components/UserSearchComponent.vue').default);

Vue.component(
    'user-search-component',
    require('./components/UserSearchComponent.vue').default
);


const app = new Vue({
    el: '#app',
});