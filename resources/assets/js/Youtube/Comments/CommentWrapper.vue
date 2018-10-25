<template>
    <div class="comment-wrapper">
        <CommentAdd/>
        <div v-for="comment in comments" v-bind:key="comment.id">
            <Comment :comment="comment" />
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Comment from './Comment';
    import CommentAdd from './CommentAdd';

    export default {
        name: "CommentWrapper",

        components: {
            Comment, CommentAdd
        },

        created(){
            window.eventBus.$on('commentAddEvent',comment=>this.handleNewComment(comment))
            this.loadComments()
        },

        data(){
            return{
                comments:[],
            }
        },
        methods:{
            handleNewComment(comment){
                this.comments.unshift(comment);
            },
            loadComments(){
                var url = window.Laravel.basePath + 'api/video/comments';
                var postData = {
                    videoId : this.$route.params.id,
                }
                axios.post(url, postData).then(response=>{
                    this.comments = response.data;
                })
            },
        }
    }
</script>

<style scoped>

</style>