<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mt-1">
                <textarea
                        name="comment"
                        v-model="comment"
                        placeholder="Add a new comment"
                        class="form-control">
                </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" @click="saveNewComment">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        created() {
            console.log(this.$route.params.id);
        },
        name: "CommentAdd",

        data() {
            return {
                comment: ''
            }
        },
        methods: {
            saveNewComment() {
                var url = window.Laravel.basePath + 'api/comment'
                var postData = {
                    body: this.comment,
                    videoId: this.$route.params.id
                }

                axios.post(url, postData).then(response => {
                    window.eventBus.$emit('commentAddEvent', response.data);
                    this.comment = ''
                })
            }
        }
    }
</script>

<style scoped>

</style>