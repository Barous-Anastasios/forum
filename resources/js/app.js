require('./bootstrap');

window.Vue = require('vue');

Vue.component('flash', require('./components/Flash.vue').default);
Vue.component('thread-view', require('./pages/Thread.vue').default);
Vue.component('paginator', require('./components/Paginator.vue').default);

Vue.component('user-notifications', require('./components/UserNotifications.vue').default);

const app = new Vue({
    el: '#app'
});
