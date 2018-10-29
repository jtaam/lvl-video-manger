require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import YoutubeDash from './Youtube/YoutubeDash';
import VideoDetail from './Youtube/VideoDetail';
import MyPlaylists from './Youtube/MyPlaylists';

Vue.use(VueRouter);


Vue.component('youtube-dashboard', require('./Youtube/YoutubeDash.vue'));

window.eventBus = new Vue({});

const routes=[
    {path:'/',component:YoutubeDash,'name':'youtube-dash'},
    {path:'/video/:id',component:VideoDetail,'name':'youtube-video'},
    {path:'/playlists',component:MyPlaylists,'name':'my-playlists'},
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
