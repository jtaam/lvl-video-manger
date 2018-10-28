<template>
    <div class="VideoDetail__wrapper row" v-if="video">
        <div class="col-sm-8 sm-push-2">
            <h2>{{video.snippet.title}}</h2>
            <br>
            <small>Channel: {{video.snippet.channelTitle}}</small>

            <div class="embed-responsive embed-responsive-16by9 mb-3">
                <iframe v-bind:src="url" class="embed-responsive-item" width="560" height="315" frameborder="0" allow="encrypted-media"></iframe>
                <!--<youtube :video-id="videoId" ref="youtube" @ended="videoEnded"></youtube>-->
                <!--<button @click="playVideo">play</button>-->
            </div>

            <p>{{video.snippet.description}}</p>

            <playlist-wrapper></playlist-wrapper>

            <hr/>
        </div>
        <div class="col-sm-8 sm-push-2">
            <CommentWrapper/>
        </div>
    </div>
</template>

<script>

    import GetVideo from './GetVideo';
    import CommentWrapper from './Comments/CommentWrapper';
    import PlaylistWrapper from './Playlist/PlaylistWrapper';

    export default {
        components:{
            CommentWrapper,
            PlaylistWrapper
        },
        created(){
            this.videoId = this.$route.params.id;
            this.url = 'https://www.youtube.com/embed/${this.videoId}';
            GetVideo({
                apiKey: 'AIzaSyDAnYDf-Tgdkgy83OHBiFAN4G_CQUewTSs',
                videoId:this.videoId,
            }, response=>{
                console.log('response video: ', response[0]);
                this.video = response[0];
            });
        },

        data(){
            return{
                videoId:null,
                video:null,
                url:null
            }
        }
    }
</script>

<style scoped>

</style>