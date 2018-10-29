<template>
    <li class="list-group-item" @click="saveToPlaylist">{{item.name}}</li>
</template>

<script>
    export default {
        name: "PlaylistItem",
        props: ['item'],
        methods: {
            saveToPlaylist() {
                let postData = {
                    videoId: this.$route.params.id,
                    playlistId: this.item.id
                }
                axios.post('/api/playlist-entry',postData)
                    .then(response=>{
                        console.info(response);
                    })
            }
        },
    }
</script>

<style scoped>

</style>