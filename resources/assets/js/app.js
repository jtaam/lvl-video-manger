require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import YoutubeDash from './Youtube/YoutubeDash';
import VideoDetail from './Youtube/VideoDetail';

Vue.use(VueRouter);


Vue.component('youtube-dashboard', require('./Youtube/YoutubeDash.vue'));

window.eventBus = new Vue({});

const routes=[
    {path:'/',component:YoutubeDash,'name':'youtube-dash'},
    {path:'/video/:id',component:VideoDetail,'name':'youtube-video'},
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
