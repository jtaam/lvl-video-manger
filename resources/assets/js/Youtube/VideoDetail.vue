<template>
    <div class="VideoDetail__wrapper row" v-if="video">
        <div class="col-sm-8 sm-push-2">
            <h2>{{video.snippet.title}}</h2>
            <br>
            <small>Channel: {{video.snippet.channelTitle}}</small>
            <p>{{video.snippet.description}}</p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe v-bind:src="url" class="embed-responsive-item"
                        width="560" height="315"
                        frameborder="0" allow="encrypted-media">
                </iframe>
            </div>
        </div>
        <div class="col-sm-8 sm-push-2">
            <CommentWrapper/>
        </div>
    </div>
</template>

<script>

    import GetVideo from './GetVideo';
    import CommentWrapper from './Comments/CommentWrapper';

    export default {
        components:{
            CommentWrapper
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