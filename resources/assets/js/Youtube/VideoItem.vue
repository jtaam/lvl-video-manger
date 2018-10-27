<template>
    <div class="VideoItem__wrapper">
        <div class="card" style="width: 18rem;">
            <router-link :to="{name:'youtube-video', params:{id:video.id.videoId, video:video}}">
                <img class="card-img-top" v-bind:src="videoImage" v-bind:alt="videoTitle">
            </router-link>
            <div class="card-body">
                <router-link :to="{name:'youtube-video', params:{id:video.id.videoId, video:video}}">
                    <h5 class="card-title text-dark">{{videoTitle}}</h5>
                </router-link>
                <p class="card-text">{{videoDescription}}</p>
                <router-link :to="{name:'youtube-video', params:{id:video.id.videoId}}" class="btn btn-primary">
                    Show Video
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['video'],

        computed:{
            videoTitle(){
                return this.video.snippet.title;
            },
            videoDescription(){
                return this.video.snippet.description;
            },
            videoImage(){
                return this.video.snippet.thumbnails.high.url;
            }
        }
    }
</script>

<style lang="scss">
    .card{
        margin: 0px 5px 5px 0px;
        .card-img-top{
            max-height: 210px;
        }
    }
</style>