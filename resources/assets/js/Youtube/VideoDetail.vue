<!--<template>-->
    <!--<div class="VideoDetail__wrapper row" v-if="video">-->
        <!--<div class="col-sm-8 sm-push-2">-->
            <!--<h2>{{video.snippet.title}}</h2>-->
            <!--<br>-->
            <!--<small>Channel: {{video.snippet.channelTitle}}</small>-->

            <!--<div class="embed-responsive embed-responsive-16by9 mb-3">-->
                <!--<div class="embed-responsive embed-responsive-16by9 mb-3">-->
                    <!--<youtube :video-id="videoId" ref="youtube" @ended="videoEnded"></youtube>-->
                    <!--<button @click="playVideo">play</button>-->
                <!--</div>-->
            <!--</div>-->

            <!--<p>{{video.snippet.description}}</p>-->

            <!--<playlist-wrapper></playlist-wrapper>-->

            <!--<hr/>-->
        <!--</div>-->
        <!--<div class="col-sm-8 sm-push-2">-->
            <!--<CommentWrapper/>-->
        <!--</div>-->
    <!--</div>-->
<!--</template>-->
<template>
    <div class="VideoDetails__wrapper">
        <!--Main wrapper-->
        <div class="row" v-if="video">
            <div class="col-sm-8">
                <h2>{{video.snippet.title}}</h2>
                <small>Channel: {{video.snippet.channelTitle}}</small>

                <div class="embed-responsive embed-responsive-16by9 mb-3">
                    <youtube :video-id="videoId" ref="youtube" @ended="videoEnded"></youtube>
                    <button @click="playVideo">play</button>
                </div>

                <p>{{video.snippet.description}}</p>

                <div class="action-buttons mt-2">
                    <playlist-wrapper></playlist-wrapper>
                </div>
            </div>

            <div class="col-sm-2">
                List of other videos
            </div>
        </div>

        <!--Comment wrapper-->
        <div class="row">
            <div class="col-sm-8 pt-4">
                <comment-wrapper></comment-wrapper>
            </div>
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